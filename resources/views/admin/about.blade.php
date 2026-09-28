@extends('admin.index')

@section('title', 'About')
@section('page-title', 'About')

@section('content')

@foreach($about as $abouts)

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1 text-white">
                About Management
            </h1>

            <p class="text-muted mb-0">
                Manage your profile information and portfolio details.
            </p>
        </div>

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


    {{-- MAIN FORM --}}
    <form
        action="{{ route('admin.about.update') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf


        {{-- ==========================================
             PROFILE CARD
        =========================================== --}}

        <div class="card bg-dark border-secondary shadow-sm mb-4">

            <div class="card-header bg-transparent border-secondary py-3">

                <div>
                    <h5 class="mb-1 text-white">
                        Profile
                    </h5>

                    <small class="text-muted">
                        Manage your profile photo and basic identity.
                    </small>
                </div>

            </div>


            <div class="card-body">

                <div class="row align-items-center">

                    {{-- IMAGE --}}
                    <div class="col-lg-3 col-md-4 text-center mb-4 mb-md-0">

                        <div
                            class="mx-auto"
                            style="
                                width: 180px;
                                height: 180px;
                                border-radius: 50%;
                                overflow: hidden;
                                border: 3px solid #334155;
                                background: #111827;
                            "
                        >

                            @if(!empty($abouts->image))

                                <img
                                    id="profilePreview"
                                    src="{{ asset($abouts->image) }}"
                                    alt="{{ $abouts->fname }} {{ $abouts->lname }}"
                                    style="
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                    "
                                >

                            @else

                                <div
                                    id="profilePlaceholder"
                                    class="d-flex align-items-center justify-content-center h-100 text-muted"
                                    style="font-size: 45px;"
                                >
                                    ◉
                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- PROFILE DETAILS --}}
                    <div class="col-lg-9 col-md-8">

                        <h4 class="text-white mb-2">

                            {{ $abouts->fname }}

                            @if($abouts->mname)
                                {{ $abouts->mname }}
                            @endif

                            {{ $abouts->lname }}

                        </h4>


                        <p class="text-muted mb-3">
                            Upload a professional profile image.
                            JPG, JPEG, PNG and WEBP are supported.
                            Maximum size: 2MB.
                        </p>


                        <div class="d-flex flex-wrap gap-2">

                            <input
                                type="file"
                                name="image"
                                id="imageInput"
                                class="form-control bg-dark text-white border-secondary"
                                accept=".jpg,.jpeg,.png,.webp"
                                onchange="previewImage(event)"
                                style="max-width: 350px;"
                            >


                            {{-- UPDATE IMAGE --}}
                            <button
                                type="submit"
                                name="up"
                                value="image"
                                class="btn btn-outline-primary"
                            >
                                Update Image
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ==========================================
             PERSONAL INFORMATION
        =========================================== --}}

        <div class="card bg-dark border-secondary shadow-sm mb-4">

            <div class="card-header bg-transparent border-secondary py-3">

                <h5 class="mb-1 text-white">
                    Personal Information
                </h5>

                <small class="text-muted">
                    Update your personal information below.
                </small>

            </div>


            <div class="card-body">

                <div class="row g-4">


                    {{-- FIRST NAME --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            First Name
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="fname"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->fname }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="a"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- MIDDLE NAME --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Middle Name
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="mname"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->mname }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="b"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- LAST NAME --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Last Name
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="lname"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->lname }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="c"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- AGE --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Age
                        </label>

                        <div class="input-group">

                            <input
                                type="number"
                                name="age"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->age }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="f"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="col-12">

                        <label class="form-label text-light">
                            Description
                        </label>

                        <div class="input-group">

                            <textarea
                                name="descr"
                                class="form-control bg-dark text-white border-secondary"
                                rows="5"
                            >{{ $abouts->descr }}</textarea>

                            <button
                                type="submit"
                                name="up"
                                value="d"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- BIRTHDAY --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Birthday
                        </label>

                        <div class="input-group">

                            <input
                                type="date"
                                name="birthday"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->birthday }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="e"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- EMAIL --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Email
                        </label>

                        <div class="input-group">

                            <input
                                type="email"
                                name="email"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->email }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="g"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- INTERESTS --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Interests
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="interests"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->interests }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="h"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- WEBSITE --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Website
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="website"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->website }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="i"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- STUDY --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Study
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="study"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->study }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="j"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- TWITTER --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Twitter
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="twitter"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->twitter }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="k"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- DEGREE --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            Degree
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="degree"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->degree }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="l"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>


                    {{-- CITY --}}
                    <div class="col-lg-6">

                        <label class="form-label text-light">
                            City
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="city"
                                class="form-control bg-dark text-white border-secondary"
                                value="{{ $abouts->city }}"
                            >

                            <button
                                type="submit"
                                name="up"
                                value="m"
                                class="btn btn-outline-primary"
                            >
                                Update
                            </button>

                        </div>

                    </div>

                </div>


                {{-- UPDATE ALL --}}

                <div class="d-flex justify-content-end mt-4 pt-4 border-top border-secondary">

                    <button
                        type="submit"
                        name="up"
                        value="all"
                        class="btn btn-primary px-4 py-2"
                    >
                        Update All
                    </button>

                </div>

            </div>

        </div>

    </form>

@endforeach


<script>

function previewImage(event)
{
    const file = event.target.files[0];

    if (!file) {
        return;
    }

    const reader = new FileReader();

    reader.onload = function(e)
    {
        let image = document.getElementById('profilePreview');

        if (image) {

            image.src = e.target.result;

        } else {

            const placeholder =
                document.getElementById('profilePlaceholder');

            if (placeholder) {

                placeholder.outerHTML =
                    '<img id="profilePreview" ' +
                    'src="' + e.target.result + '" ' +
                    'alt="Profile Image" ' +
                    'style="width:100%;height:100%;object-fit:cover;">';

            }

        }
    };

    reader.readAsDataURL(file);
}

</script>

@endsection