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
                      <th scope="col" width="20%">Status</th>
                  </tr>
              </thead>
              <tbody>
                  {{-- @foreach ($complaints as $index => $complaint) --}}
                      <tr>
                          {{-- <th>{{ $index + 1 }}</th> --}}
                          <td>
                              {{-- <p class="my-0"><strong>{{ $complaint->name }}</strong></p><p class="my-0 text-muted" style="font-size: 0.75rem;"> --}}
                                {{-- {{ $complaint->created_at->translatedFormat('d M Y') }} --}}
                            </p>
                            
                              {{-- <p class="my-0">{{ $complaint->message }}</p> --}}
                              <p class="my-0 text-muted" style="font-size: 0.75rem;">
                                {{-- {{ $complaint->created_at->format('H.i') }} --}}
                            </p>
                            {{-- @if ($complaint->status === 'belum dibalas') --}}
                              <a href=#
                                  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-secondary"
                                  style="font-size: 0.75rem;"> balas</a>
                            {{-- @endif --}}
                                  
                            {{-- @if ($complaint->status === 'sudah dibalas') --}}
                            <div class="d-flex mt-2 ms-3 align-items-start">
                                <!-- Garis vertikal tipis -->
                                <hr><hr><hr>
                                {{-- <div class="me-2">
                                    <i class="bi bi-reply-fill"></i>
                                </div> --}}
                            
                                <!-- Konten balasan -->
                                <div>
                                    {{-- <p class="my-0"><strong>{{ $complaint->response_name }}</strong></p>
                                    <p class="my-0 text-muted" style="font-size: 0.75rem;">
                                        {{ $complaint->updated_at->translatedFormat('d M Y') }}
                                    </p>
                                    <p class="my-0">{{ $complaint->response_subject }}</p>
                                    <p class="my-0">{{ $complaint->response_message }}</p> --}}
                                </div>
                            </div>
                            {{-- @endif --}}
                            
                                
                          </td>
                          {{-- <td class="align-middle" style="white-space: nowrap;">
                            @if ($complaint->status === 'sudah dibalas')
                                <span class="badge bg-success">sudah dibalas</span>
                            @else
                                <span class="badge bg-secondary">belum dibalas</span>
                            @endif
                        </td> --}}

                      </tr>
                  {{-- @endforeach --}}
              </tbody>
          </table>
      </div>
  </div>

@endsection