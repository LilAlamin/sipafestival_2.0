@extends('admin.layouts.main')

@section('content')

<div class="card m-3 rounded-4 bg-white border-white shadow">
    <div class="card-header d-flex rounded-4 bg-white border-white justify-content-between align-items-center">
        <span>DAFTAR BERITA</span>
        <a href="/admin/dashboard/news/makeNews" class="btn btn-primary">Buat Berita</a>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">No</th>
                    <th scope="col" width="65%" class="text-left">Berita</th>
                    <th scope="col" width="30%" class="text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $index => $new)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>
                            <p class="my-0"><strong>{{ $new->title }}</strong></p>
                            <p class="my-0 text-muted" style="font-size: 0.75rem;">{{ $new->created_at->translatedFormat('d M Y - H:i') }}</p>
                            <img src="{{ asset('/images/news/' . $new->image_path) }}" alt="Gambar" class="img-fluid my-2" style="max-height: 120px;">
                            <p class="my-0">{{ Str::limit($new->description, 200, '...') }}</p>
                        </td>
                        <td class="align-middle">
                            <!-- View -->
                            <a href="{{ url('/admin/dashboard/news/' . $new->slug) }}"
                               class="text-info d-block mb-1" style="font-size: 0.85rem;">
                                <i class="bi bi-eye"></i> view
                            </a>

                            <!-- Edit -->
                            <a href="{{ url('/admin/dashboard/news/edit/' . $new->slug) }}"
                               class="text-warning d-block mb-1" style="font-size: 0.85rem;">
                                <i class="bi bi-pencil-square"></i> edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('news.destroy', $new->id) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0" style="font-size: 0.85rem;">
                                    <i class="bi bi-trash3-fill"></i> hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
