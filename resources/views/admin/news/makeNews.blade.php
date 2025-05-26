@extends('admin.layouts.main')

@section('content')
<div class="card m-3 rounded-4 bg-white border-white shadow">
    <div class="container bg-white p-5 rounded shadow-sm">
        <h4 class="mb-4">{{ isset($news) ? 'Edit Berita' : 'Buat Berita' }}</h4>

        <form action="{{ isset($news) ? route('news.updateBySlug', $news->slug) : route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input name="title" type="text" class="form-control" id="title"
                       value="{{ old('title', $news->title ?? '') }}" placeholder="Masukkan judul berita" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Isi Berita</label>
                <textarea name="description" class="form-control" id="description" rows="6" placeholder="Tulis isi berita..." required>{{ old('description', $news->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto (jpg, png, jpeg; max 2MB)</label>
                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
                @if(isset($news) && $news->image_path)
                    <div class="mt-2">
                        <p>Gambar saat ini:</p>
                        <img src="{{ asset('/images/news/' . $news->image_path) }}" alt="Gambar lama" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($news) ? 'Update Berita' : 'Simpan Berita' }}</button>
        </form>
    </div>
</div>
@endsection
