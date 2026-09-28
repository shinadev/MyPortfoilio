@extends('admin.index')

@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')

<div class="content-header">
    <div>
        <h1 class="content-title">Projects</h1>
        <p>Manage your portfolio projects, images, and descriptions.</p>
    </div>

```
<div class="content-header-badge">
    <i class="fa-solid fa-folder-open"></i>
    Portfolio
</div>
```

</div>

<div class="admin-card">

```
<div class="admin-card-header">
    <div>
        <h3>
            <i class="fa-solid fa-code-branch"></i>
            Project Management
        </h3>

        <p>
            Update your existing portfolio projects below.
        </p>
    </div>

    <span class="admin-badge">
        {{ count($project) }} {{ count($project) == 1 ? 'Project' : 'Projects' }}
    </span>
</div>


<div class="projects-list">

    @forelse($project as $projects)

        <form
            method="POST"
            enctype="multipart/form-data"
            class="project-admin-card"
        >

            @csrf

            <div class="project-admin-header">

                <div class="project-number">
                    <span>
                        Project
                    </span>

                    <strong>
                        #{{ $projects->project_id }}
                    </strong>
                </div>

                <div class="project-status">
                    <i class="fa-solid fa-circle-check"></i>
                    Existing Project
                </div>

            </div>


            <div class="project-admin-body">

                {{-- Project Image --}}
                <div class="project-image-section">

                    <div class="project-image-preview">

                        @if($projects->project_image)

                            <img
                                src="{{ asset('img/' . $projects->project_image) }}"
                                alt="{{ $projects->project_name }}"
                            >

                        @else

                            <div class="project-image-empty">
                                <i class="fa-regular fa-image"></i>
                                <span>No Image</span>
                            </div>

                        @endif

                    </div>

                    <label class="project-upload">

                        <i class="fa-solid fa-cloud-arrow-up"></i>

                        <span>
                            Change Project Image
                        </span>

                        <small>
                            JPG, PNG, WEBP recommended
                        </small>

                        <input
                            type="file"
                            name="project_image"
                            accept="image/*"
                        >

                    </label>

                </div>


                {{-- Project Details --}}
                <div class="project-details">

                    <div class="admin-form-group">

                        <label for="project_name_{{ $projects->project_id }}">
                            Project Name
                        </label>

                        <div class="admin-input-wrapper">

                            <i class="fa-solid fa-heading"></i>

                            <input
                                id="project_name_{{ $projects->project_id }}"
                                type="text"
                                name="project_name"
                                value="{{ $projects->project_name }}"
                                placeholder="Enter project name"
                                required
                            >

                        </div>

                    </div>


                    <div class="admin-form-group">

                        <label for="project_descr_{{ $projects->project_id }}">
                            Project Description
                        </label>

                        <textarea
                            id="project_descr_{{ $projects->project_id }}"
                            name="project_descr"
                            rows="7"
                            placeholder="Describe this project..."
                        >{{ $projects->project_descr }}</textarea>

                    </div>

                </div>

            </div>


            <div class="project-admin-footer">

                <div class="project-file-info">

                    <i class="fa-regular fa-image"></i>

                    <span>
                        {{ $projects->project_image ?: 'No image selected' }}
                    </span>

                </div>

                <button
                    type="submit"
                    name="up"
                    value="{{ $projects->project_id }}"
                    class="btn-admin-primary"
                >
                    <i class="fa-solid fa-floppy-disk"></i>
                    Update Project
                </button>

            </div>

        </form>

    @empty

        <div class="admin-empty-state">

            <div class="empty-icon">
                <i class="fa-solid fa-folder-open"></i>
            </div>

            <h3>No Projects Found</h3>

            <p>
                There are currently no projects in your portfolio.
            </p>

        </div>

    @endforelse

</div>
```

</div>

@push('styles')

<style>

    /* ================================
       PROJECT ADMIN
    ================================= */

    .projects-list {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .project-admin-card {
        background: rgba(255, 255, 255, 0.025);
        border: 1px solid var(--admin-border);
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.25s ease;
    }

    .project-admin-card:hover {
        border-color: rgba(76, 175, 80, 0.28);
        background: rgba(255, 255, 255, 0.035);
    }


    /* Header */

    .project-admin-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px 24px;
        border-bottom: 1px solid var(--admin-border);
    }

    .project-number {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .project-number span {
        color: var(--admin-muted);
        font-size: 13px;
    }

    .project-number strong {
        color: var(--admin-text);
        font-size: 14px;
    }

    .project-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 11px;
        border-radius: 999px;
        background: rgba(76, 175, 80, 0.10);
        border: 1px solid rgba(76, 175, 80, 0.18);
        color: #72d47a;
        font-size: 12px;
        font-weight: 600;
    }

    .project-status i {
        font-size: 7px;
    }


    /* Body */

    .project-admin-body {
        display: grid;
        grid-template-columns: 260px minmax(0, 1fr);
        gap: 28px;
        padding: 26px;
    }


    /* Image */

    .project-image-section {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .project-image-preview {
        width: 100%;
        height: 190px;
        border-radius: 14px;
        overflow: hidden;
        background: #080b12;
        border: 1px solid var(--admin-border);
    }

    .project-image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .project-image-empty {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: var(--admin-muted);
    }

    .project-image-empty i {
        font-size: 32px;
    }

    .project-image-empty span {
        font-size: 13px;
    }


    /* Upload */

    .project-upload {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        min-height: 88px;
        padding: 14px;
        border: 1px dashed rgba(255, 255, 255, 0.14);
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.02);
        cursor: pointer;
        text-align: center;
        transition: 0.2s ease;
    }

    .project-upload:hover {
        border-color: var(--admin-primary-light);
        background: rgba(76, 175, 80, 0.05);
    }

    .project-upload i {
        color: var(--admin-primary-light);
        font-size: 20px;
    }

    .project-upload span {
        color: var(--admin-text);
        font-size: 13px;
        font-weight: 600;
    }

    .project-upload small {
        color: var(--admin-muted);
        font-size: 11px;
    }

    .project-upload input {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }


    /* Details */

    .project-details {
        min-width: 0;
    }

    .admin-form-group {
        margin-bottom: 20px;
    }

    .admin-form-group:last-child {
        margin-bottom: 0;
    }

    .admin-form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--admin-text);
        font-size: 13px;
        font-weight: 600;
    }

    .admin-input-wrapper {
        position: relative;
    }

    .admin-input-wrapper > i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: var(--admin-muted);
        pointer-events: none;
    }

    .admin-input-wrapper input,
    .admin-form-group textarea {
        width: 100%;
        border: 1px solid var(--admin-border);
        border-radius: 11px;
        background: rgba(255, 255, 255, 0.035);
        color: var(--admin-text);
        outline: none;
        font-family: inherit;
        transition: 0.2s ease;
    }

    .admin-input-wrapper input {
        height: 48px;
        padding: 0 15px 0 43px;
    }

    .admin-form-group textarea {
        padding: 14px 15px;
        resize: vertical;
        min-height: 150px;
        line-height: 1.6;
    }

    .admin-input-wrapper input:focus,
    .admin-form-group textarea:focus {
        border-color: var(--admin-primary-light);
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.08);
    }

    .admin-input-wrapper input::placeholder,
    .admin-form-group textarea::placeholder {
        color: #657083;
    }


    /* Footer */

    .project-admin-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 17px 24px;
        border-top: 1px solid var(--admin-border);
        background: rgba(0, 0, 0, 0.10);
    }

    .project-file-info {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 0;
        color: var(--admin-muted);
        font-size: 12px;
    }

    .project-file-info i {
        color: var(--admin-primary-light);
    }

    .project-file-info span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 350px;
    }


    /* Empty */

    .admin-empty-state {
        padding: 70px 20px;
        text-align: center;
        color: var(--admin-muted);
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: rgba(76, 175, 80, 0.08);
        border: 1px solid rgba(76, 175, 80, 0.14);
        color: var(--admin-primary-light);
        font-size: 25px;
    }

    .admin-empty-state h3 {
        margin: 0 0 7px;
        color: var(--admin-text);
        font-size: 18px;
    }

    .admin-empty-state p {
        margin: 0;
        color: var(--admin-muted);
        font-size: 13px;
    }


    /* Responsive */

    @media (max-width: 900px) {

        .project-admin-body {
            grid-template-columns: 1fr;
        }

        .project-image-section {
            max-width: 400px;
        }

    }


    @media (max-width: 600px) {

        .project-admin-header,
        .project-admin-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .project-admin-body {
            padding: 18px;
        }

        .project-admin-header {
            padding: 17px 18px;
        }

        .project-admin-footer {
            padding: 17px 18px;
        }

        .project-image-section {
            max-width: none;
        }

        .project-admin-footer .btn-admin-primary {
            width: 100%;
            justify-content: center;
        }

    }

</style>

@endpush

@endsection
