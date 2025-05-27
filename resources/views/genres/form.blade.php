@csrf
<div class="mb-3">
    <label for="name" class="form-label">Title genre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $genre->name ?? '') }}" required>
</div>
<button class="btn btn-primary">Save</button>
