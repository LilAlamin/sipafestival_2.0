@extends('admin.layouts.main')

@section('content')
    <div class="form-container shadow-sm">
    <h2>Create News</h2>
    <form id="newsForm" novalidate>
        <div class="mb-3">
            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="Enter news title"
                required
            />
            <div class="invalid-feedback">Title is required.</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="4"
                placeholder="Enter news description"
                required
            ></textarea>
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo (jpg, png, jpeg; max 5MB)<span class="text-danger">*</span></label>
            <input
                class="form-control"
                type="file"
                id="photo"
                name="photo"
                accept=".jpg, .jpeg, .png"
                required
            />
            <div class="invalid-feedback" id="photoError">Please upload a valid photo (jpg, png, jpeg) and size less than 5MB.</div>
            <img id="previewImage" class="preview-img d-none" alt="Preview" />
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>

<!-- Bootstrap JS Bundle CDN (for potential bootstrap components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const newsForm = document.getElementById('newsForm');
        const photoInput = document.getElementById('photo');
        const previewImage = document.getElementById('previewImage');
        const photoError = document.getElementById('photoError');

        // Validate photo input on change - show preview and error if invalid
        photoInput.addEventListener('change', function() {
            photoError.style.display = 'none';
            previewImage.classList.add('d-none');
            previewImage.src = '';

            if (!photoInput.files || photoInput.files.length === 0) {
                return;
            }
            const file = photoInput.files[0];
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const maxSize = 5 * 1024 * 1024; // 5MB

            if (!validTypes.includes(file.type)) {
                photoError.style.display = 'block';
                photoInput.classList.add('is-invalid');
                return;
            }
            if (file.size > maxSize) {
                photoError.style.display = 'block';
                photoInput.classList.add('is-invalid');
                return;
            }

            photoInput.classList.remove('is-invalid');

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        });

        newsForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Reset previous validation states
            const formControls = newsForm.querySelectorAll('.form-control');
            formControls.forEach(control => {
                control.classList.remove('is-invalid');
            });
            photoError.style.display = 'none';

            let isValid = true;

            // Validate title
            const title = newsForm.title.value.trim();
            if (title === '') {
                newsForm.title.classList.add('is-invalid');
                isValid = false;
            }

            // Validate description
            const description = newsForm.description.value.trim();
            if (description === '') {
                newsForm.description.classList.add('is-invalid');
                isValid = false;
            }

            // Validate photo
            if (!photoInput.files || photoInput.files.length === 0) {
                photoInput.classList.add('is-invalid');
                photoError.textContent = 'Photo is required.';
                photoError.style.display = 'block';
                isValid = false;
            } else {
                const file = photoInput.files[0];
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                const maxSize = 5 * 1024 * 1024; // 5MB

                if (!validTypes.includes(file.type)) {
                    photoInput.classList.add('is-invalid');
                    photoError.textContent = 'Invalid file type. Only jpg, jpeg, png are allowed.';
                    photoError.style.display = 'block';
                    isValid = false;
                } else if (file.size > maxSize) {
                    photoInput.classList.add('is-invalid');
                    photoError.textContent = 'File size exceeds 5MB limit.';
                    photoError.style.display = 'block';
                    isValid = false;
                }
            }

            if (isValid) {
                // For demo purpose: show alert or console.log the form data
                alert('News submitted successfully!');
                newsForm.reset();
                previewImage.src = '';
                previewImage.classList.add('d-none');
            }
        });
    });
</script>


@endsection