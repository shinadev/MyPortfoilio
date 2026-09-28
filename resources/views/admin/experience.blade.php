@extends('admin.index')

@section('title', 'Experience')
@section('page-title', 'Experience')

@section('content')

<div class="content-header">


<div>
    <h1 class="content-title">
        Experience
    </h1>

    <p class="content-subtitle">
        Manage your professional experience and career history.
    </p>
</div>


</div>

<div class="row g-4">

<div class="col-12">

    <div class="admin-card">

        <!-- =================================================
             HEADER
        ================================================== -->

        <div class="admin-card-header">

            <div>

                <h3 class="admin-card-title">

                    <i class="fa-solid fa-briefcase me-2"
                       style="color:#4caf50;">
                    </i>

                    Professional Experience

                </h3>

                <div class="text-secondary mt-1"
                     style="font-size:11px;">

                    Update the positions, companies and descriptions
                    displayed on your portfolio.

                </div>

            </div>


            <div class="admin-badge admin-badge-success">

                <i class="fa-solid fa-circle-check me-1"></i>

                Experience

            </div>

        </div>


        <!-- =================================================
             BODY
        ================================================== -->

        <div class="admin-card-body">


            {{-- SUCCESS MESSAGE --}}

            @if(session('success'))

                <div class="alert alert-success border-0 shadow-sm mb-4">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR MESSAGE --}}

            @if($errors->any())

                <div class="alert alert-danger border-0 shadow-sm mb-4">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            @forelse($experience as $experiences)


                <!-- =====================================
                     EXPERIENCE FORM
                ====================================== -->

                <form method="POST"
                      class="experience-form mb-4">

                    @csrf


                    <!-- =====================================
                         EXPERIENCE CARD
                    ====================================== -->

                    <div
                        style="
                            padding:20px;
                            border-radius:14px;
                            background:rgba(255,255,255,.025);
                            border:1px solid rgba(255,255,255,.07);
                        "
                    >

                        <div class="row g-4">


                            <!-- Position -->

                            <div class="col-md-6">

                                <label
                                    for="pos_name_{{ $experiences->experience_id }}"
                                    class="form-label"
                                >

                                    <i
                                        class="fa-solid fa-user-tie me-1"
                                        style="color:#4caf50;"
                                    ></i>

                                    Position Name

                                </label>


                                <input
                                    type="text"
                                    id="pos_name_{{ $experiences->experience_id }}"
                                    name="pos_name"
                                    class="form-control"
                                    value="{{ old('pos_name', $experiences->pos_name) }}"
                                    placeholder="e.g. Senior Web Developer"
                                    required
                                >

                            </div>


                            <!-- Company -->

                            <div class="col-md-6">

                                <label
                                    for="pos_company_{{ $experiences->experience_id }}"
                                    class="form-label"
                                >

                                    <i
                                        class="fa-solid fa-building me-1"
                                        style="color:#22d3ee;"
                                    ></i>

                                    Company

                                </label>


                                <input
                                    type="text"
                                    id="pos_company_{{ $experiences->experience_id }}"
                                    name="pos_company"
                                    class="form-control"
                                    value="{{ old('pos_company', $experiences->pos_company) }}"
                                    placeholder="e.g. DevAxis Technologies"
                                    required
                                >

                            </div>


                            <!-- Description -->

                            <div class="col-12">

                                <label
                                    for="pos_descr_{{ $experiences->experience_id }}"
                                    class="form-label"
                                >

                                    <i
                                        class="fa-solid fa-align-left me-1"
                                        style="color:#4caf50;"
                                    ></i>

                                    Position Description

                                </label>


                                <textarea
                                    id="pos_descr_{{ $experiences->experience_id }}"
                                    name="pos_descr"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Describe your responsibilities, achievements and experience..."
                                    required
                                >{{ old('pos_descr', $experiences->pos_descr) }}</textarea>

                            </div>


                        </div>


                        <!-- =================================
                             FOOTER
                        ================================== -->

                        <div
                            class="d-flex flex-wrap
                                   align-items-center
                                   justify-content-between
                                   gap-3 mt-4 pt-3"
                            style="
                                border-top:1px solid rgba(255,255,255,.06);
                            "
                        >

                            <div
                                style="
                                    color:#667085;
                                    font-size:11px;
                                "
                            >

                                <i
                                    class="fa-solid fa-circle-info me-1"
                                ></i>

                                Experience ID:

                                <strong style="color:#8994a7;">
                                    {{ $experiences->experience_id }}
                                </strong>

                            </div>


                            <button
                                type="submit"
                                name="up"
                                value="{{ $experiences->experience_id }}"
                                class="btn-admin-primary"
                            >

                                <i class="fa-solid fa-floppy-disk"></i>

                                Update Experience

                            </button>

                        </div>

                    </div>

                </form>


            @empty


                <!-- =========================================
                     EMPTY STATE
                ========================================== -->

                <div
                    class="text-center"
                    style="
                        padding:70px 20px;
                        color:#697586;
                    "
                >

                    <div
                        style="
                            width:64px;
                            height:64px;
                            margin:0 auto 18px;

                            display:flex;
                            align-items:center;
                            justify-content:center;

                            border-radius:18px;

                            background:rgba(55,140,63,.08);

                            border:1px solid rgba(55,140,63,.14);

                            color:#4caf50;

                            font-size:24px;
                        "
                    >

                        <i class="fa-solid fa-briefcase"></i>

                    </div>


                    <h5
                        style="
                            color:#dbe3ef;
                            font-size:15px;
                            font-weight:700;
                        "
                    >

                        No Experience Found

                    </h5>


                    <p
                        style="
                            max-width:420px;
                            margin:7px auto 0;
                            font-size:12px;
                        "
                    >

                        There are currently no experience records
                        available to manage.

                    </p>

                </div>


            @endforelse


        </div>

    </div>

</div>


</div>

@endsection
