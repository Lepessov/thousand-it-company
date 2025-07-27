Есть token-based аутентификация!

#### GET	/api/v1/news	Получить список новостей
#### POST	/api/v1/news	Добавить новость
#### GET	/api/v1/news/by//id/{id}	Просмотр конкретной новости
#### POST	/api/v1/news/search	Поиск по заголовку
#### GET	/api/v1/authors/{id}/news	Новости автора
#### GET	/api/v1/categories/{id}/news	Новости категории (и дочерних)
#### POST	/api/v1/authors	Добавить автора
#### POST	/api/v1/categories	Добавить категорию

#### POST   /api/login
#### POST   /api/register
#### POST   /api/logout


наполнение базы данными

php artisan migrate --seed

