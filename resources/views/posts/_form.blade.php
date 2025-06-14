@csrf
<div class="form-group">
    <label for="title">Judul Berita</label>
    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title ?? '') }}" required>
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="category_id">Kategori</label>
    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ isset($post) && $post->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="content">Isi Berita</label>
    {{-- Nanti kita bisa ganti ini dengan rich text editor seperti CKEditor --}}
    <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $post->content ?? '') }}</textarea>
    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="image">Gambar Unggulan</label>
    @if(isset($post) && $post->image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="200">
        </div>
    @endif
    <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar. Max 2MB.</small>
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Simpan' }}</button>