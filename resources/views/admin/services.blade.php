@extends('admin.index')

@section('title', 'Services')
@section('page-title', 'Services')

@section('content')

<div class="content-header">
    <div>
        <h1 class="content-title">Services</h1>
        <p>Manage the services displayed on your portfolio website.</p>
    </div>


<div class="content-header-badge">
    <i class="fa-solid fa-layer-group"></i>
    Services
</div>


</div>

<div class="admin-card">


<div class="admin-card-header">

    <div>
        <h3>
            <i class="fa-solid fa-briefcase"></i>
            Service Management
        </h3>

        <p>
            Update your service categories and service names.
        </p>
    </div>

    <span class="admin-badge">
        {{ count($select) }} {{ count($select) == 1 ? 'Service' : 'Services' }}
    </span>

</div>


<div class="services-list">

    @forelse($select as $selects)

        <form method="POST" class="service-admin-card">

            @csrf

            <div class="service-admin-left">

                <div class="service-icon">
                    <i class="fa-solid fa-briefcase"></i>
                </div>

                <div class="service-number">
                    <span>Service ID</span>
                    <strong>#{{ $selects->service_id }}</strong>
                </div>

            </div>


            <div class="service-admin-fields">

                <div class="admin-form-group">

                    <label for="service_type_{{ $selects->service_id }}">
                        Service Type
                    </label>

                    <div class="admin-input-wrapper">

                        <i class="fa-solid fa-tags"></i>

                        <input
                            id="service_type_{{ $selects->service_id }}"
                            type="text"
                            name="type"
                            value="{{ $selects->type }}"
                            placeholder="e.g. Web Development"
                            required
                        >

                    </div>

                </div>


                <div class="admin-form-group">

                    <label for="service_name_{{ $selects->service_id }}">
                        Service Name
                    </label>

                    <div class="admin-input-wrapper">

                        <i class="fa-solid fa-pen"></i>

                        <input
                            id="service_name_{{ $selects->service_id }}"
                            type="text"
                            name="service_name"
                            value="{{ $selects->service_name }}"
                            placeholder="Enter service name"
                            required
                        >

                    </div>

                </div>

            </div>


            <div class="service-admin-action">

                <button
                    type="submit"
                    name="up"
                    value="{{ $selects->service_id }}"
                    class="btn-admin-primary"
                >
                    <i class="fa-solid fa-floppy-disk"></i>
                    Update
                </button>

            </div>

        </form>

    @empty

        <div class="admin-empty-state">

            <div class="empty-icon">
                <i class="fa-solid fa-briefcase"></i>
            </div>

            <h3>No Services Found</h3>

            <p>
                There are currently no services available to manage.
            </p>

        </div>

    @endforelse

</div>


</div>

@push('styles')

<style>

    /* =========================================
       SERVICES ADMIN
    ========================================= */

    .services-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }


    .service-admin-card {
        display: grid;
        grid-template-columns: 190px minmax(0, 1fr) auto;
        align-items: center;
        gap: 24px;

        padding: 20px;

        background: rgba(255, 255, 255, 0.025);
        border: 1px solid var(--admin-border);
        border-radius: 16px;

        transition: all 0.25s ease;
    }


    .service-admin-card:hover {
        background: rgba(255, 255, 255, 0.035);
        border-color: rgba(76, 175, 80, 0.28);
        transform: translateY(-1px);
    }


    /* =========================================
       LEFT SIDE
    ========================================= */

    .service-admin-left {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }


    .service-icon {
        width: 45px;
        height: 45px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: rgba(76, 175, 80, 0.10);
        border: 1px solid rgba(76, 175, 80, 0.16);

        color: var(--admin-primary-light);
        font-size: 17px;
    }


    .service-number {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }


    .service-number span {
        color: var(--admin-muted);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }


    .service-number strong {
        color: var(--admin-text);
        font-size: 14px;
    }


    /* =========================================
       FORM FIELDS
    ========================================= */

    .service-admin-fields {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 18px;
        min-width: 0;
    }


    .admin-form-group {
        margin: 0;
    }


    .admin-form-group label {
        display: block;
        margin-bottom: 7px;

        color: var(--admin-text);
        font-size: 12px;
        font-weight: 600;
    }


    .admin-input-wrapper {
        position: relative;
    }


    .admin-input-wrapper i {
        position: absolute;
        top: 50%;
        left: 14px;

        transform: translateY(-50%);

        color: var(--admin-muted);
        font-size: 13px;

        pointer-events: none;
    }


    .admin-input-wrapper input {
        width: 100%;
        height: 46px;

        padding: 0 14px 0 40px;

        border: 1px solid var(--admin-border);
        border-radius: 10px;

        outline: none;

        background: rgba(255, 255, 255, 0.035);
        color: var(--admin-text);

        font-family: inherit;
        font-size: 13px;

        transition: 0.2s ease;
    }


    .admin-input-wrapper input:focus {
        border-color: var(--admin-primary-light);

        background: rgba(255, 255, 255, 0.05);

        box-shadow:
            0 0 0 3px rgba(76, 175, 80, 0.08);
    }


    .admin-input-wrapper input::placeholder {
        color: #657083;
    }


    /* =========================================
       ACTION
    ========================================= */

    .service-admin-action {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }


    .service-admin-action .btn-admin-primary {
        white-space: nowrap;
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

        .service-admin-card {
            grid-template-columns: 160px minmax(0, 1fr);
        }

        .service-admin-action {
            grid-column: 2;
            justify-content: flex-start;
        }

    }


    @media (max-width: 700px) {

        .service-admin-card {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .service-admin-fields {
            grid-template-columns: 1fr;
        }

        .service-admin-action {
            grid-column: auto;
            width: 100%;
        }

        .service-admin-action .btn-admin-primary {
            width: 100%;
            justify-content: center;
        }

    }

</style>

@endpush

@endsection
