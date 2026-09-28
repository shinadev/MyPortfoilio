@extends('admin.index')

@section('title', 'Skills')
@section('page-title', 'Skills')

@section('content')

<div class="content-header">


<div>
    <h1 class="content-title">Skills</h1>

    <p>
        Manage the technical skills displayed on your portfolio.
    </p>
</div>

<div class="content-header-badge">
    <i class="fa-solid fa-certificate"></i>
    Skills
</div>


</div>

<div class="admin-card">


<div class="admin-card-header">

    <div>
        <h3>
            <i class="fa-solid fa-code"></i>
            Skills Management
        </h3>

        <p>
            Update your skill information and proficiency values.
        </p>
    </div>

    <span class="admin-badge">
        Technical Skills
    </span>

</div>


@if(session('success'))

    <div class="admin-alert admin-alert-success">

        <i class="fa-solid fa-circle-check"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


@if(session('error'))

    <div class="admin-alert admin-alert-error">

        <i class="fa-solid fa-circle-exclamation"></i>

        <span>
            {{ session('error') }}
        </span>

    </div>

@endif


<div class="skills-list">

    @forelse($skill as $skills)


        {{-- =========================
             CSS
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    CSS
                </div>

                <div>
                    <strong>CSS</strong>
                    <span>Cascading Style Sheets</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="css_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-brands fa-css3-alt"></i>

                    <input
                        id="css_{{ $loop->index }}"
                        type="text"
                        name="css"
                        value="{{ $skills->css }}"
                        placeholder="Enter CSS value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="c"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             JAVASCRIPT
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    JS
                </div>

                <div>
                    <strong>JavaScript</strong>
                    <span>JavaScript Programming</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="javascript_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-brands fa-js"></i>

                    <input
                        id="javascript_{{ $loop->index }}"
                        type="text"
                        name="javascript"
                        value="{{ $skills->javascript }}"
                        placeholder="Enter JavaScript value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="j"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             HTML
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    HT
                </div>

                <div>
                    <strong>HTML</strong>
                    <span>HyperText Markup Language</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="html_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-brands fa-html5"></i>

                    <input
                        id="html_{{ $loop->index }}"
                        type="text"
                        name="html"
                        value="{{ $skills->html }}"
                        placeholder="Enter HTML value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="h"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             WORDPRESS
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    WP
                </div>

                <div>
                    <strong>WordPress</strong>
                    <span>WordPress CMS</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="wordpress_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-brands fa-wordpress"></i>

                    <input
                        id="wordpress_{{ $loop->index }}"
                        type="text"
                        name="wordpress"
                        value="{{ $skills->wordpress }}"
                        placeholder="Enter WordPress value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="w"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             JQUERY
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    JQ
                </div>

                <div>
                    <strong>jQuery</strong>
                    <span>JavaScript Library</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="jquery_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-solid fa-code"></i>

                    <input
                        id="jquery_{{ $loop->index }}"
                        type="text"
                        name="jquery"
                        value="{{ $skills->jquery }}"
                        placeholder="Enter jQuery value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="j"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             ANGULAR
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    NG
                </div>

                <div>
                    <strong>Angular</strong>
                    <span>Angular Framework</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="angular_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-brands fa-angular"></i>

                    <input
                        id="angular_{{ $loop->index }}"
                        type="text"
                        name="angular"
                        value="{{ $skills->angular }}"
                        placeholder="Enter Angular value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="a"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             PHP
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    PHP
                </div>

                <div>
                    <strong>PHP</strong>
                    <span>PHP Programming</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="php_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-brands fa-php"></i>

                    <input
                        id="php_{{ $loop->index }}"
                        type="text"
                        name="php"
                        value="{{ $skills->php }}"
                        placeholder="Enter PHP value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="p"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


        {{-- =========================
             MYSQL
        ========================== --}}

        <form method="POST" class="skill-admin-card">

            @csrf

            <div class="skill-admin-info">

                <div class="skill-icon">
                    DB
                </div>

                <div>
                    <strong>MySQL</strong>
                    <span>Relational Database</span>
                </div>

            </div>


            <div class="skill-admin-input">

                <label for="mysql_{{ $loop->index }}">
                    Skill Value
                </label>

                <div class="skill-input-wrapper">

                    <i class="fa-solid fa-database"></i>

                    <input
                        id="mysql_{{ $loop->index }}"
                        type="text"
                        name="mysql"
                        value="{{ $skills->mysql }}"
                        placeholder="Enter MySQL value"
                    >

                </div>

            </div>


            <button
                type="submit"
                name="up"
                value="m"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Update
            </button>

        </form>


    @empty

        <div class="admin-empty-state">

            <div class="empty-icon">
                <i class="fa-solid fa-code"></i>
            </div>

            <h3>No Skills Found</h3>

            <p>
                There are currently no skill records available.
            </p>

        </div>

    @endforelse

</div>


</div>

@push('styles')

<style>

    /* =========================================
       SKILLS ADMIN
    ========================================= */

    .skills-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }


    .skill-admin-card {
        display: grid;
        grid-template-columns: 260px minmax(200px, 1fr) auto;
        align-items: center;
        gap: 25px;

        padding: 18px 22px;

        background: rgba(255, 255, 255, 0.025);

        border: 1px solid var(--admin-border);

        border-radius: 14px;

        transition: all 0.25s ease;
    }


    .skill-admin-card:hover {
        background: rgba(255, 255, 255, 0.04);

        border-color: rgba(76, 175, 80, 0.28);

        transform: translateY(-1px);
    }


    /* =========================================
       SKILL INFORMATION
    ========================================= */

    .skill-admin-info {
        display: flex;
        align-items: center;
        gap: 13px;

        min-width: 0;
    }


    .skill-icon {
        width: 45px;
        height: 45px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: rgba(76, 175, 80, 0.10);

        border: 1px solid rgba(76, 175, 80, 0.17);

        color: var(--admin-primary-light);

        font-size: 12px;
        font-weight: 800;
    }


    .skill-admin-info > div:last-child {
        min-width: 0;

        display: flex;
        flex-direction: column;

        gap: 4px;
    }


    .skill-admin-info strong {
        color: var(--admin-text);

        font-size: 14px;

        font-weight: 700;
    }


    .skill-admin-info span {
        color: var(--admin-muted);

        font-size: 11px;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    /* =========================================
       INPUT
    ========================================= */

    .skill-admin-input {
        min-width: 0;
    }


    .skill-admin-input label {
        display: block;

        margin-bottom: 6px;

        color: var(--admin-muted);

        font-size: 11px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: .05em;
    }


    .skill-input-wrapper {
        position: relative;
    }


    .skill-input-wrapper i {
        position: absolute;

        top: 50%;
        left: 14px;

        transform: translateY(-50%);

        color: var(--admin-muted);

        font-size: 14px;

        pointer-events: none;
    }


    .skill-input-wrapper input {
        width: 100%;

        height: 45px;

        padding: 0 14px 0 40px;

        border: 1px solid var(--admin-border);

        border-radius: 10px;

        background: rgba(255, 255, 255, 0.035);

        color: var(--admin-text);

        outline: none;

        font-family: inherit;

        font-size: 13px;

        transition: 0.2s ease;
    }


    .skill-input-wrapper input:focus {
        border-color: var(--admin-primary-light);

        background: rgba(255, 255, 255, 0.05);

        box-shadow:
            0 0 0 3px rgba(76, 175, 80, 0.08);
    }


    .skill-input-wrapper input::placeholder {
        color: #657083;
    }


    /* =========================================
       BUTTON
    ========================================= */

    .skill-admin-card .btn-admin-primary {
        white-space: nowrap;
    }


    /* =========================================
       ALERTS
    ========================================= */

    .admin-alert {
        margin: 20px 24px 0;

        padding: 13px 15px;

        display: flex;
        align-items: center;

        gap: 10px;

        border-radius: 10px;

        font-size: 13px;
    }


    .admin-alert-success {
        background: rgba(34, 197, 94, 0.08);

        border: 1px solid rgba(34, 197, 94, 0.18);

        color: #86efac;
    }


    .admin-alert-error {
        background: rgba(239, 68, 68, 0.08);

        border: 1px solid rgba(239, 68, 68, 0.18);

        color: #fca5a5;
    }


    /* =========================================
       EMPTY STATE
    ========================================= */

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


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1050px) {

        .skill-admin-card {
            grid-template-columns: 210px minmax(180px, 1fr) auto;

            gap: 18px;
        }

    }


    @media (max-width: 850px) {

        .skill-admin-card {
            grid-template-columns: 1fr auto;

            gap: 15px;
        }

        .skill-admin-input {
            grid-column: 1 / -1;
            grid-row: 2;
        }

        .skill-admin-card .btn-admin-primary {
            grid-column: 2;
            grid-row: 1;
        }

    }


    @media (max-width: 600px) {

        .skill-admin-card {
            grid-template-columns: 1fr;

            padding: 18px;

            gap: 15px;
        }

        .skill-admin-input {
            grid-column: auto;
            grid-row: auto;
        }

        .skill-admin-card .btn-admin-primary {
            grid-column: auto;
            grid-row: auto;

            width: 100%;

            justify-content: center;
        }

    }

</style>

@endpush

@endsection
