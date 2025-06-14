@csrf
<div class="form-group">
    <label for="name">Nama Kategori</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
           value="{{ old('name', $category->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Simpan' }}</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>