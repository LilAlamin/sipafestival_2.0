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
                      <th scope="col" width="75%" class="text-left">Aduan</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($news as $index => $new)
                      <tr>
                          <th>{{ $index + 1 }}</th>
                          <td>
                              <p class="my-0"><strong>{{ $new->title }}</strong></p><p class="my-0 text-muted" style="font-size: 0.75rem;">
                                {{ $new->created_at->translatedFormat('d M Y') }}
                            </p>
                            <img src="{{ asset('/images/news/' . $new->image_path) }}" alt="Gambar">

                            
                              <p class="my-0">{{ $new->description }}</p>
                              <p class="my-0 text-muted" style="font-size: 0.75rem;">
                                {{ $new->created_at->format('H.i') }}
                            </p>

                            <div class="d-flex mt-2 ms-3 align-items-start">
                                <!-- Garis vertikal tipis -->
                                <hr><hr><hr>
                        
                            </div>

                          </td>

                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>

@endsection