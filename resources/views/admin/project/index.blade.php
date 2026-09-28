@extends('admin.index')

@section('title', 'Projects')
@section('page-title', 'Projects')

@push('styles')

<style>
    /* =========================
       PROJECT MANAGEMENT
    ========================== */

    .project-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 26px;
    }

    .project-heading h2 {
        margin: 0;
        font-size: 25px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .project-heading p {
        margin: 7px 0 0;
        color: var(--admin-muted);
        font-size: 13px;
    }

    .project-add-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border-radius: 10px;
        background: var(--admin-primary);
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: .2s ease;
        white-space: nowrap;
    }

    .project-add-btn:hover {
        background: var(--admin-primary-light);
        color: #fff;
        transform: translateY(-1px);
    }

    /* =========================
       ALERTS
    ========================== */

    .project-alert {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        padding: 13px 16px;
        margin-bottom: 20px;
        border-radius: 11px;
        font-size: 13px;
    }

    .project-alert i {
        margin-top: 2px;
    }

    .project-alert-success {
        background: rgba(34, 197, 94, .09);
        border: 1px solid rgba(34, 197, 94, .18);
        color: #86efac;
    }

    .project-alert-danger {
        background: rgba(239, 68, 68, .09);
        border: 1px solid rgba(239, 68, 68, .18);
        color: #fca5a5;
    }

    .project-error-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .project-error-list li + li {
        margin-top: 4px;
    }

    /* =========================
       PROJECT GRID
    ========================== */

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .project-card {
        background: var(--admin-card);
        border: 1px solid var(--admin-border);
        border-radius: 15px;
        overflow: hidden;
        transition: .25s ease;
        backdrop-filter: blur(10px);
    }

    .project-card:hover {
        transform: translateY(-3px);
        border-color: rgba(76, 175, 80, .25);
        box-shadow: 0 14px 35px rgba(0, 0, 0, .18);
    }

    /* =========================
       PROJECT IMAGE
    ========================== */

    .project-image {
        height: 200px;
        background: #080c13;
        position: relative;
        overflow: hidden;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .3s ease;
    }

    .project-card:hover .project-image img {
        transform: scale(1.03);
    }

    .image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #475569;
        font-size: 35px;
    }

    /* =========================
       PROJECT CONTENT
    ========================== */

    .project-content {
        padding: 18px;
    }

    .project-name {
        margin: 0 0 8px;
        color: var(--admin-text);
        font-size: 15px;
        font-weight: 750;
        line-height: 1.4;
    }

    .project-description {
        margin: 0;
        color: var(--admin-muted);
        font-size: 12px;
        line-height: 1.7;
        min-height: 42px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* =========================
       ACTIONS
    ========================== */

    .project-actions {
        display: flex;
        gap: 9px;
        border-top: 1px solid var(--admin-border);
        margin-top: 17px;
        padding-top: 14px;
    }

    .project-edit-btn,
    .project-delete-btn {
        flex: 1;
        min-height: 39px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .project-edit-btn {
        border: 1px solid rgba(55, 140, 63, .25);
        background: rgba(55, 140, 63, .10);
        color: #86efac;
        text-decoration: none;
    }

    .project-edit-btn:hover {
        background: rgba(55, 140, 63, .18);
        color: #bbf7d0;
    }

    .project-delete-btn {
        border: 1px solid rgba(239, 68, 68, .18);
        background: rgba(239, 68, 68, .08);
        color: #fca5a5;
    }

    .project-delete-btn:hover {
        background: rgba(239, 68, 68, .16);
        color: #fecaca;
    }

    /* =========================
       EMPTY STATE
    ========================== */

    .project-empty-state {
        grid-column: 1 / -1;
        padding: 70px 25px;
        text-align: center;
        background: var(--admin-card);
        border: 1px dashed rgba(255, 255, 255, .12);
        border-radius: 15px;
    }

    .project-empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: rgba(255, 255, 255, .045);
        color: var(--admin-muted);
        font-size: 22px;
    }

    .project-empty-state h3 {
        margin: 0;
        color: var(--admin-text);
        font-size: 17px;
        font-weight: 700;
    }

    .project-empty-state p {
        margin: 7px 0 20px;
        color: var(--admin-muted);
        font-size: 12px;
    }

    .project-empty-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border-radius: 9px;
        background: var(--admin-primary);
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .project-empty-btn:hover {
        background: var(--admin-primary-light);
        color: #fff;
    }

    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 1150px) {
        .projects-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .project-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .project-add-btn {
            width: 100%;
            justify-content: center;
        }

        .projects-grid {
            grid-template-columns: 1fr;
        }

        .project-heading h2 {
            font-size: 21px;
        }
    }

    @media (max-width: 480px) {
        .project-actions {
            flex-direction: column;
        }

        .project-edit-btn,
        .project-delete-btn {
            width: 100%;
        }
    }
</style>

@endpush

@section('content')

<div class="project-page-header">


<div class="project-heading">
    <h2>Project Management</h2>

    <p>
        Add, update and manage projects displayed on your portfolio.
    </p>
</div>

<a href="{{ route('admin.project.create') }}" class="project-add-btn">
    <i class="fa-solid fa-plus"></i>
    Add Project
</a>

</div>

{{-- SUCCESS MESSAGE --}}
@if(session('success'))

<div class="project-alert project-alert-success">
    <i class="fa-solid fa-circle-check"></i>

    <div>
        {{ session('success') }}
    </div>
</div>

@endif

{{-- ERROR MESSAGE --}}
@if($errors->any())


<div class="project-alert project-alert-danger">

    <i class="fa-solid fa-circle-exclamation"></i>

    <div>
        <ul class="project-error-list">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>
    </div>

</div>

@endif

{{-- PROJECTS --}}

<div class="projects-grid">
@forelse($project as $projects)

    <article class="project-card">

        {{-- IMAGE --}}
        <div class="project-image">

            @if($projects->project_image)

                <img
                    src="{{ asset($projects->project_image) }}"
                    alt="{{ $projects->project_name }}"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >

                <div class="image-placeholder" style="display:none;">
                    <i class="fa-regular fa-image"></i>
                </div>

            @else

                <div class="image-placeholder">
                    <i class="fa-regular fa-image"></i>
                </div>

            @endif

        </div>


        {{-- PROJECT CONTENT --}}
        <div class="project-content">

            <h3 class="project-name">
                {{ $projects->project_name }}
            </h3>

            <p class="project-description">
                {{ $projects->project_descr }}
            </p>


            {{-- ACTIONS --}}
            <div class="project-actions">

                {{-- EDIT --}}
                <a
                    href="{{ route('admin.project.edit', $projects->project_id) }}"
                    class="project-edit-btn"
                >
                    <i class="fa-solid fa-pen"></i>
                    Edit
                </a>


                {{-- DELETE --}}
                <form
                    action="{{ route('admin.project.delete', $projects->project_id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this project?');"
                    style="flex: 1;"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="project-delete-btn"
                        style="width: 100%;"
                    >
                        <i class="fa-solid fa-trash"></i>
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </article>

@empty

    {{-- EMPTY STATE --}}
    <div class="project-empty-state">

        <div class="project-empty-icon">
            <i class="fa-regular fa-folder-open"></i>
        </div>

        <h3>No Projects Yet</h3>

        <p>
            You haven't added any portfolio projects yet.
        </p>

        <a
            href="{{ route('admin.project.create') }}"
            class="project-empty-btn"
        >
            <i class="fa-solid fa-plus"></i>
            Create Your First Project
        </a>

    </div>

@endforelse


</div>

@endsection
