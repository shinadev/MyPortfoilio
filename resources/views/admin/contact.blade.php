@extends('admin.index')

@section('title', 'Contact Settings')
@section('page-title', 'Contact Settings')

@section('content')

<div class="content-header">

    <div>
        <h1 class="content-title">
            Contact Settings
        </h1>

        <p class="content-subtitle">
            Manage the contact information displayed on your portfolio website.
        </p>
    </div>

</div>


<div class="row g-4">

    <div class="col-12">

        <div class="admin-card">

            <!-- Card Header -->

            <div class="admin-card-header">

                <div>
                    <h3 class="admin-card-title">
                        Contact Information
                    </h3>

                    <div class="text-secondary mt-1"
                         style="font-size: 11px;">

                        Update your address, email, phone number and website.

                    </div>
                </div>

                <div class="admin-badge admin-badge-success">

                    <i class="fa-solid fa-circle-check me-1"></i>

                    Active

                </div>

            </div>


            <!-- Card Body -->

            <div class="admin-card-body">

                @foreach($contact as $contacts)

                    <form class="admin-contact-form"
                          method="POST">

                        @csrf


                        <div class="row g-4">


                            <!-- Address -->

                            <div class="col-md-6">

                                <label for="contact_address"
                                       class="form-label">

                                    <i class="fa-solid fa-location-dot me-1"
                                       style="color:#4caf50;">
                                    </i>

                                    Address

                                </label>

                                <input
                                    type="text"
                                    id="contact_address"
                                    name="contact_address"
                                    class="form-control"
                                    value="{{ old('contact_address', $contacts->contact_address) }}"
                                    placeholder="Enter your address"
                                    required
                                >

                            </div>


                            <!-- Email -->

                            <div class="col-md-6">

                                <label for="contact_email"
                                       class="form-label">

                                    <i class="fa-solid fa-envelope me-1"
                                       style="color:#22d3ee;">
                                    </i>

                                    Email Address

                                </label>

                                <input
                                    type="email"
                                    id="contact_email"
                                    name="contact_email"
                                    class="form-control"
                                    value="{{ old('contact_email', $contacts->contact_email) }}"
                                    placeholder="Enter your email address"
                                    required
                                >

                            </div>


                            <!-- Phone -->

                            <div class="col-md-6">

                                <label for="contact_no"
                                       class="form-label">

                                    <i class="fa-solid fa-phone me-1"
                                       style="color:#4caf50;">
                                    </i>

                                    Phone Number

                                </label>

                                <input
                                    type="text"
                                    id="contact_no"
                                    name="contact_no"
                                    class="form-control"
                                    value="{{ old('contact_no', $contacts->contact_no) }}"
                                    placeholder="Enter your phone number"
                                    required
                                >

                            </div>


                            <!-- Website -->

                            <div class="col-md-6">

                                <label for="contact_website"
                                       class="form-label">

                                    <i class="fa-solid fa-globe me-1"
                                       style="color:#22d3ee;">
                                    </i>

                                    Website

                                </label>

                                <input
                                    type="url"
                                    id="contact_website"
                                    name="contact_website"
                                    class="form-control"
                                    value="{{ old('contact_website', $contacts->contact_website) }}"
                                    placeholder="https://example.com"
                                >

                            </div>


                        </div>


                        <!-- Divider -->

                        <div class="my-4"
                             style="
                                height:1px;
                                background:rgba(255,255,255,.07);
                             ">
                        </div>


                        <!-- Bottom -->

                        <div class="d-flex flex-wrap
                                    align-items-center
                                    justify-content-between
                                    gap-3">

                            <div style="
                                color:#667085;
                                font-size:11px;
                            ">

                                <i class="fa-solid fa-circle-info me-1"></i>

                                Changes will appear on your public contact section.

                            </div>


                            <button
                                type="submit"
                                name="up"
                                value="{{ $contacts->contact_id }}"
                                class="btn-admin-primary">

                                <i class="fa-solid fa-floppy-disk"></i>

                                Save Changes

                            </button>

                        </div>

                    </form>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection

