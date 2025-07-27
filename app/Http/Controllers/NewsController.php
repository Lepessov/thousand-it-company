<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return News::with(['author', 'categories'])
            ->latest('published_at')
            ->paginate(10);
    }

    public function show($id)
    {
        $news = News::with(['author', 'categories'])->find($id);
        if (!$news) {
            return response()->json(['error' => 'Новость не найдена'], 404);
        }

        return response()->json($news);
    }

    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();

        $news = News::create($validated);
        $news->categories()->attach($validated['categories']);

        return response()->json($news->load('author', 'categories'), 201);
    }

    public function byAuthor($authorId)
    {
        return News::with(['categories'])
            ->where('author_id', $authorId)
            ->latest('published_at')
            ->paginate(10);
    }

    public function byCategory($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['error' => 'Рубрика не найдена'], 404);
        }

        $categoryIds = $this->getCategoryWithChildren($category);

        return News::with(['author', 'categories'])
            ->whereHas('categories', fn($q) => $q->whereIn('categories.id', $categoryIds))
            ->paginate(10);
    }

    public function search(SearchNewsRequest $request)
    {
        $title = $request->validated()['title'];

        return News::with(['author', 'categories'])
            ->where('title', 'like', '%' . $title . '%')
            ->paginate(10);
    }

    // 🔁 Вспомогательная функция для вложенных рубрик
    private function getCategoryWithChildren(Category $category): array
    {
        $ids = [$category->id];
        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getCategoryWithChildren($child));
        }
        return $ids;
    }
}
