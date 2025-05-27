# 🎬 Test Laravel Movies & Genres API + CRUD

This project demonstrates a simple implementation of a movie and genre management system using Laravel 10+. It includes a full **CRUD interface** and **REST API with pagination**, supports **poster uploads**, and displays genres associated with each movie.

---

## 📦 Features

- CRUD for genres
- CRUD for movies with poster upload
- Poster upload with default image fallback
- Movie publishing/unpublishing
- REST API:
  - `/api/genres` — list of all genres
  - `/api/genres/{id}` — movies for a specific genre (paginated)
  - `/api/movies` — all movies (paginated)
  - `/api/movies/{id}` — specific movie with genres

---

## 🚀 Installation

```bash
git clone https://github.com/vitkonovaluck/test_laravel_movie_api_crud.git
cd test_laravel_movie_api_crud
composer install
cp .env.example .env
php artisan key:generate
```

🔧 Configure your `.env` file with your database settings.

---

## 🗃 Migrations and Seeders

```bash
php artisan migrate --seed
```

This will create the tables:

- `genres`
- `movies`
- `genre_movie` (many-to-many pivot)

And populate them with 20 movies and several genres.

---

## 📁 Poster Storage

Posters are stored in:

```
storage/app/public/posters
```

Make sure to link the storage folder:

```bash
php artisan storage:link
```

---

## 🧪 API Testing

To test the REST API:

1. Use Postman or Insomnia
2. Base URL: `http://127.0.0.1:8000/api`

### Sample Endpoints:

| Method | URL                          | Description                      |
|--------|------------------------------|----------------------------------|
| GET    | `/api/genres`                | List all genres                  |
| GET    | `/api/genres/1`              | List movies for genre ID 1       |
| GET    | `/api/movies`                | List all movies (paginated)      |
| GET    | `/api/movies/1`              | Get movie with ID 1              |

---

## 🎨 Frontend

Frontend is built with Blade and optionally Bootstrap/Vue. A CRUD interface for genres and movies is available via the navigation menu.

---

## ✅ Validation

All forms include server-side validation:
- Genre name is required
- Movie title is required
- Poster must be a valid image
- Movies are unpublished by default

---

## 📂 API Resources

The project uses `GenreResource` and `MovieResource` to clean up JSON responses.

---

## 🤝 Author

**Your Name**  
Email: `vkonovaluck@gmail.com`  
GitHub: [Vitaliy](https://github.com/vitkonovaluck/)