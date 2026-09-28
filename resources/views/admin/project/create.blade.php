@extends('admin.index')

@section('title', 'Projects')
@section('page-title', 'Projects')


@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0b1120;
            color: #e5e7eb;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: 250px;
            background: #080d19;
            border-right: 1px solid #1e293b;
            padding: 25px 15px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .logo {
            font-size: 21px;
            font-weight: 800;
            padding: 0 15px 30px;
            color: #fff;
        }

        .logo span {
            color: #3b82f6;
        }

        .menu-title {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 700;
            padding: 0 15px 10px;
            letter-spacing: .08em;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #94a3b8;
            padding: 12px 15px;
            margin-bottom: 4px;
            border-radius: 8px;
            font-size: 14px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #172554;
            color: #60a5fa;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 15px;
            right: 15px;
        }

        .logout button {
            width: 100%;
            padding: 11px;
            border: 0;
            border-radius: 8px;
            background: #1e293b;
            color: #cbd5e1;
            cursor: pointer;
        }

        .logout button:hover {
            background: #7f1d1d;
            color: #fff;
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 27px;
            color: #fff;
        }

        .topbar p {
            margin-top: 6px;
            color: #64748b;
            font-size: 14px;
        }

        .back-btn {
            text-decoration: none;
            background: #1e293b;
            color: #cbd5e1;
            padding: 11px 17px;
            border-radius: 8px;
            font-size: 14px;
        }

        .back-btn:hover {
            background: #334155;
        }

        /* FORM CARD */

        .card {
            max-width: 850px;
            background: #111827;
            border: 1px solid #1e293b;
            border-radius: 14px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 23px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #e2e8f0;
            margin-bottom: 9px;
        }

        input,
        textarea {
            width: 100%;
            background: #0b1120;
            border: 1px solid #334155;
            color: #fff;
            padding: 13px 14px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #3b82f6;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 10px;
        }

        .help {
            margin-top: 7px;
            color: #64748b;
            font-size: 12px;
        }

        .error {
            margin-top: 7px;
            color: #f87171;
            font-size: 13px;
        }

        .preview-box {
            margin-top: 15px;
            display: none;
        }

        .preview-box img {
            width: 220px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #334155;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .save-btn {
            border: 0;
            background: #2563eb;
            color: #fff;
            padding: 13px 22px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-btn:hover {
            background: #1d4ed8;
        }

        .cancel-btn {
            text-decoration: none;
            background: #1e293b;
            color: #cbd5e1;
            padding: 13px 22px;
            border-radius: 8px;
        }

        .cancel-btn:hover {
            background: #334155;
        }

        @media (max-width: 800px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 25px;
            }
        }

        @media (max-width: 650px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .logout {
                position: relative;
                left: auto;
                right: auto;
                bottom: auto;
                margin-top: 20px;
            }

            .layout {
                display: block;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .topbar h1 {
                font-size: 22px;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
@endpush

@section('content')


        <div class="topbar">

            <div>
                <h1>Add New Project</h1>

                <p>
                    Add a new project to your portfolio.
                </p>
            </div>

            <a href="{{ route('admin.project') }}" class="back-btn">
                ← Back to Projects
            </a>

        </div>


        <div class="card">

            @if ($errors->any())

                <div style="
                    background:#450a0a;
                    border:1px solid #7f1d1d;
                    color:#fecaca;
                    padding:15px;
                    border-radius:8px;
                    margin-bottom:25px;
                ">

                    <strong>Please fix the following:</strong>

                    <ul style="margin:10px 0 0 20px;">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('admin.project.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- PROJECT NAME -->

                <div class="form-group">

                    <label for="project_name">
                        Project Name
                    </label>

                    <input
                        type="text"
                        id="project_name"
                        name="project_name"
                        value="{{ old('project_name') }}"
                        placeholder="Enter project name"
                        required
                    >

                    @error('project_name')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- PROJECT IMAGE -->

                <div class="form-group">

                    <label for="project_image">
                        Project Image
                    </label>

                    <input
                        type="file"
                        id="project_image"
                        name="project_image"
                        accept="image/jpeg,image/png,image/webp"
                        required
                    >

                    <div class="help">
                        JPG, JPEG, PNG or WEBP. Maximum size: 2MB.
                    </div>

                    @error('project_image')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror


                    <div class="preview-box" id="previewBox">

                        <img
                            id="previewImage"
                            src=""
                            alt="Image preview"
                        >

                    </div>

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label for="project_descr">
                        Project Description
                    </label>

                    <textarea
                        id="project_descr"
                        name="project_descr"
                        placeholder="Describe this project..."
                        required
                    >{{ old('project_descr') }}</textarea>

                    @error('project_descr')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- ACTIONS -->

                <div class="actions">

                    <button type="submit" class="save-btn">
                        Save Project
                    </button>

                    <a
                        href="{{ route('admin.project') }}"
                        class="cancel-btn"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

   

<script>

    const imageInput = document.getElementById('project_image');

    const previewBox = document.getElementById('previewBox');

    const previewImage = document.getElementById('previewImage');


    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            previewBox.style.display = 'none';

            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            previewImage.src = event.target.result;

            previewBox.style.display = 'block';

        };

        reader.readAsDataURL(file);

    });

</script>
@endsection