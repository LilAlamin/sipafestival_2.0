@extends('admin.layouts.main')

@section('content')
<div class="card m-3 rounded-4 bg-white border-white shadow">
    <div class="container bg-white p-5 rounded shadow-sm">
        <h4 class="mb-4">Buat Berita</h4>
    
        <!-- Form Balasan -->
       <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="subject" class="form-label">Judul Berita</label>
            <input name="title" type="text" class="form-control" id="subject" placeholder="Masukkan subjek balasan">
          </div>  

          <div class="mb-3">
            <label for="message" class="form-label">Isi Berita</label>
            <textarea name="description" class="form-control" id="message" rows="6" placeholder="Tulis isi pesan balasan di sini..."></textarea>
          </div>
    
        <div class="mb-3">
            <label for="photo" class="form-label">Photo (jpg, png, jpeg; max 5MB)<span class="text-danger">*</span></label>
            <input
                class="form-control"
                type="file"
                id="photo"
                name="image"
                accept=".jpg, .jpeg, .png"
                required
            />
            <div class="invalid-feedback" id="photoError">Please upload a valid photo (jpg, png, jpeg) and size less than 5MB.</div>
            <img id="previewImage" class="preview-img d-none" alt="Preview" />
        </div>
        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
        </form>
      </div>
</div>


@endsection