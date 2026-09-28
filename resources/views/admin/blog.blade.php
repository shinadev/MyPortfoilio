@extends('admin.index')

@section('title', 'Blog')
@section('page-title', 'Blog')

@section('content')

<div class="container-fluid px-0">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1 text-white">
                Blog Management
            </h1>

            <p class="text-muted mb-0">
                Create, edit and manage your blog posts.
            </p>
        </div>

        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#createBlogModal"
        >
            <i class="fas fa-plus me-1"></i>
            Add Blog
        </button>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm">
            {{ session('success') }}
        </div>

    @endif


    {{-- ERROR MESSAGE --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    {{-- BLOG CARD --}}
    <div class="card bg-dark border-secondary shadow-sm">

        <div class="card-header bg-transparent border-secondary py-3">

            <div>
                <h5 class="mb-1 text-white">
                    Blog Posts
                </h5>

                <small class="text-muted">
                    Manage all your blog articles.
                </small>
            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-dark table-hover align-middle mb-0">

                    <thead>

                        <tr>

                            <th class="px-4 py-3">
                                #
                            </th>

                            <th>
                                Image
                            </th>

                            <th>
                                Blog Title
                            </th>

                            <th>
                                Description
                            </th>

                            <th class="text-end px-4">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($blog as $blogs)

                            <tr>

                                {{-- ID --}}
                                <td class="px-4">

                                    <span class="text-muted">
                                        {{ $blogs->blog_id }}
                                    </span>

                                </td>


                                {{-- IMAGE --}}
                                <td>

                                    @if(!empty($blogs->blog_image))

                                        <img
                                            src="{{ asset($blogs->blog_image) }}"
                                            alt="{{ $blogs->blog_title }}"
                                            style="
                                                width: 70px;
                                                height: 50px;
                                                object-fit: cover;
                                                border-radius: 8px;
                                                border: 1px solid #334155;
                                            "
                                        >

                                    @else

                                        <div
                                            class="d-flex align-items-center justify-content-center bg-secondary"
                                            style="
                                                width: 70px;
                                                height: 50px;
                                                border-radius: 8px;
                                            "
                                        >
                                            <i class="fas fa-image text-white-50"></i>
                                        </div>

                                    @endif

                                </td>


                                {{-- TITLE --}}
                                <td>

                                    <strong class="text-white">
                                        {{ $blogs->blog_title }}
                                    </strong>

                                </td>


                                {{-- DESCRIPTION --}}
                                <td style="min-width: 300px; max-width: 450px;">

                                    <span class="text-muted">

                                        {{ \Illuminate\Support\Str::limit($blogs->blog_descr, 100) }}

                                    </span>

                                </td>


                                {{-- ACTIONS --}}
                                <td class="text-end px-4">

                                    {{-- EDIT --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-primary me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editBlogModal{{ $blogs->blog_id }}"
                                    >
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>


                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('admin.blog.delete', $blogs->blog_id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this blog post?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>


                            {{-- EDIT MODAL --}}
                            <div
                                class="modal fade"
                                id="editBlogModal{{ $blogs->blog_id }}"
                                tabindex="-1"
                                aria-hidden="true"
                            >

                                <div class="modal-dialog modal-lg modal-dialog-centered">

                                    <div class="modal-content bg-dark border-secondary">

                                        <div class="modal-header border-secondary">

                                            <h5 class="modal-title text-white">
                                                Edit Blog Post
                                            </h5>

                                            <button
                                                type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"
                                            ></button>

                                        </div>


                                        <form
                                            action="{{ route('admin.blog.update', $blogs->blog_id) }}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                        >

                                            @csrf

                                            <div class="modal-body">

                                                {{-- TITLE --}}
                                                <div class="mb-3">

                                                    <label class="form-label text-white">
                                                        Blog Title
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="blog_title"
                                                        class="form-control bg-dark text-white border-secondary"
                                                        value="{{ $blogs->blog_title }}"
                                                        required
                                                    >

                                                </div>


                                                {{-- CURRENT IMAGE --}}
                                                <div class="mb-3">

                                                    <label class="form-label text-white">
                                                        Current Image
                                                    </label>

                                                    <div>

                                                        @if(!empty($blogs->blog_image))

                                                            <img
                                                                src="{{ asset($blogs->blog_image) }}"
                                                                alt="{{ $blogs->blog_title }}"
                                                                style="
                                                                    width: 180px;
                                                                    height: 110px;
                                                                    object-fit: cover;
                                                                    border-radius: 10px;
                                                                "
                                                            >

                                                        @else

                                                            <p class="text-muted">
                                                                No image uploaded.
                                                            </p>

                                                        @endif

                                                    </div>

                                                </div>


                                                {{-- NEW IMAGE --}}
                                                <div class="mb-3">

                                                    <label class="form-label text-white">
                                                        Replace Image
                                                    </label>

                                                    <input
                                                        type="file"
                                                        name="blog_image"
                                                        class="form-control bg-dark text-white border-secondary"
                                                        accept=".jpg,.jpeg,.png,.webp"
                                                    >

                                                    <small class="text-muted">
                                                        Leave empty to keep the current image.
                                                        Maximum size: 2MB.
                                                    </small>

                                                </div>


                                                {{-- DESCRIPTION --}}
                                                <div class="mb-3">

                                                    <label class="form-label text-white">
                                                        Description
                                                    </label>

                                                    <textarea
                                                        name="blog_descr"
                                                        rows="6"
                                                        class="form-control bg-dark text-white border-secondary"
                                                        required
                                                    >{{ $blogs->blog_descr }}</textarea>

                                                </div>

                                            </div>


                                            <div class="modal-footer border-secondary">

                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Cancel
                                                </button>

                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    <i class="fas fa-save me-1"></i>
                                                    Save Changes
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center py-5"
                                >

                                    <div class="mb-3">

                                        <i
                                            class="fas fa-newspaper fa-3x text-muted"
                                        ></i>

                                    </div>

                                    <h5 class="text-white">
                                        No Blog Posts
                                    </h5>

                                    <p class="text-muted mb-3">
                                        You haven't created any blog posts yet.
                                    </p>

                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#createBlogModal"
                                    >
                                        <i class="fas fa-plus me-1"></i>
                                        Create Your First Blog
                                    </button>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- CREATE BLOG MODAL --}}
{{-- ========================================================= --}}

<div
    class="modal fade"
    id="createBlogModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content bg-dark border-secondary">

            <div class="modal-header border-secondary">

                <div>

                    <h5 class="modal-title text-white">
                        Create Blog Post
                    </h5>

                    <small class="text-muted">
                        Add a new article to your portfolio.
                    </small>

                </div>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <form
                action="{{ route('admin.blog.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="modal-body">

                    {{-- TITLE --}}
                    <div class="mb-3">

                        <label class="form-label text-white">
                            Blog Title
                        </label>

                        <input
                            type="text"
                            name="blog_title"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Enter blog title"
                            required
                        >

                    </div>


                    {{-- IMAGE --}}
                    <div class="mb-3">

                        <label class="form-label text-white">
                            Blog Image
                        </label>

                        <input
                            type="file"
                            name="blog_image"
                            id="blogImageInput"
                            class="form-control bg-dark text-white border-secondary"
                            accept=".jpg,.jpeg,.png,.webp"
                            required
                        >

                        <small class="text-muted">
                            JPG, JPEG, PNG or WEBP. Maximum 2MB.
                        </small>

                    </div>


                    {{-- IMAGE PREVIEW --}}
                    <div
                        id="blogImagePreviewContainer"
                        class="mb-3"
                        style="display:none;"
                    >

                        <label class="form-label text-white">
                            Image Preview
                        </label>

                        <div>

                            <img
                                id="blogImagePreview"
                                src=""
                                alt="Preview"
                                style="
                                    width: 220px;
                                    height: 140px;
                                    object-fit: cover;
                                    border-radius: 10px;
                                    border: 1px solid #334155;
                                "
                            >

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="mb-3">

                        <label class="form-label text-white">
                            Description
                        </label>

                        <textarea
                            name="blog_descr"
                            rows="7"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Write your blog description..."
                            required
                        ></textarea>

                    </div>

                </div>


                <div class="modal-footer border-secondary">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-plus me-1"></i>
                        Create Blog
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- IMAGE PREVIEW SCRIPT --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('blogImageInput');
    const previewContainer = document.getElementById('blogImagePreviewContainer');
    const previewImage = document.getElementById('blogImagePreview');

    if (imageInput) {

        imageInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {

                previewContainer.style.display = 'none';
                previewImage.src = '';

                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {

                previewImage.src = e.target.result;

                previewContainer.style.display = 'block';

            };

            reader.readAsDataURL(file);

        });

    }

});

</script>

@endsection

