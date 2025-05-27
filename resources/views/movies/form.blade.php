@csrf
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $movie->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="genres" class="form-label">Genres</label>
    <select name="genres[]" multiple class="form-control" required>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}"
                {{ isset($movie) && $movie->genres->contains($genre->id) ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="poster" class="form-label">Poster</label>
    <input type="file" name="poster" class="form-control">
    @isset($movie)
        <img src="{{ asset('storage/' . $movie->poster_path) }}" width="100" class="mt-2">
    @endisset
</div>

<button class="btn btn-primary">Save</button>
