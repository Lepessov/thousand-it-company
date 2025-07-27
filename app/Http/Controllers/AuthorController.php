<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::paginate(10);
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());
        return response()->json($author, 201);
    }
}
