@extends('admin.layouts.main')

@section('content')
<div class="card m-3 rounded-4 bg-white border-white shadow">
    <div class="card-body">
        <h3>{{ $news->title }}</h3>
        <p class="text-muted">{{ $news->created_at->translatedFormat('d F Y H:i') }}</p>
        <img src="{{ asset('/images/news/' . $news->image_path) }}" class="img-fluid mb-3" alt="News Image" style="weight: 200px;  height: 200px">
        <p>{{ $news->description }}</p>
        <a href="{{ route('news.showNews') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
