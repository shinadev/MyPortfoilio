@extends('admin.index')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- Welcome --}}
    <div class="dashboard-header mb-4">
        <div>
            <h2>Welcome back, Admin 👋</h2>
            <p>Here is an overview of your portfolio website.</p>
        </div>

        <div>
            <a href="{{ route('admin.project.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Add Project
            </a>
        </div>
    </div>


    {{-- Statistics --}}
    <div class="row g-4 mb-4">

        {{-- Projects --}}
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-card">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-folder-open"></i>
                </div>

                <div>
                    <span>Total Projects</span>
                    <h3>{{ $projects }}</h3>
                </div>
            </div>
        </div>


        {{-- Blog --}}
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-card">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-newspaper"></i>
                </div>

                <div>
                    <span>Blog Posts</span>
                    <h3>{{ $blogs }}</h3>
                </div>
            </div>
        </div>


        {{-- Services --}}
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-card">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-briefcase"></i>
                </div>

                <div>
                    <span>Services</span>
                    <h3>{{ $services }}</h3>
                </div>
            </div>
        </div>


        {{-- Skills --}}
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-card">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-code"></i>
                </div>

                <div>
                    <span>Skills</span>
                    <h3>{{ $skills }}</h3>
                </div>
            </div>
        </div>


        {{-- Experience --}}
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-card">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-briefcase"></i>
                </div>

                <div>
                    <span>Experience</span>
                    <h3>{{ $experiences }}</h3>
                </div>
            </div>
        </div>


        {{-- Messages --}}
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-card">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div>
                    <span>Messages</span>
                    <h3>{{ $contacts }}</h3>
                </div>
            </div>
        </div>

    </div>


    {{-- Quick Actions --}}
    <div class="dashboard-section mb-4">

        <div class="section-heading">
            <div>
                <h4>Quick Actions</h4>
                <p>Manage your portfolio quickly.</p>
            </div>
        </div>

        <div class="quick-actions">

            <a href="{{ route('admin.project.create') }}" class="quick-action">
                <i class="fa-solid fa-plus"></i>
                <span>Add Project</span>
            </a>

            <a href="{{ route('admin.blog') }}" class="quick-action">
                <i class="fa-solid fa-pen"></i>
                <span>Manage Blog</span>
            </a>

            <a href="{{ route('admin.services') }}" class="quick-action">
                <i class="fa-solid fa-briefcase"></i>
                <span>Manage Services</span>
            </a>

            <a href="{{ route('admin.skills') }}" class="quick-action">
                <i class="fa-solid fa-code"></i>
                <span>Manage Skills</span>
            </a>

        </div>

    </div>


    {{-- Recent Content --}}
    <div class="row g-4">

        {{-- Recent Projects --}}
        <div class="col-lg-7">

            <div class="dashboard-section">

                <div class="section-heading">
                    <div>
                        <h4>Recent Projects</h4>
                        <p>Your latest portfolio projects.</p>
                    </div>

                    <a href="{{ route('admin.project') }}">
                        View All
                    </a>
                </div>


                <div class="table-responsive">

                    <table class="dashboard-table">

                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($recentProjects as $item)

                                <tr>

                                    <td>
                                        <div class="project-name">
                                            @if($item->project_image)
                                                <img
                                                    src="{{ asset($item->project_image) }}"
                                                    alt="{{ $item->project_name }}"
                                                >
                                            @endif

                                            <span>
                                                {{ $item->project_name }}
                                            </span>
                                        </div>
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($item->project_descr, 45) }}
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('admin.project.edit', $item->project_id) }}"
                                            class="table-action"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="empty-state">
                                        No projects found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- Recent Blog --}}
        <div class="col-lg-5">

            <div class="dashboard-section">

                <div class="section-heading">
                    <div>
                        <h4>Recent Blog</h4>
                        <p>Latest published content.</p>
                    </div>

                    <a href="{{ route('admin.blog') }}">
                        View All
                    </a>
                </div>


                <div class="blog-list">

                    @forelse($recentBlogs as $item)

                        <div class="blog-item">

                            <div class="blog-icon">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>

                            <div class="blog-info">

                                <h5>
                                    {{ \Illuminate\Support\Str::limit($item->blog_title, 35) }}
                                </h5>

                                <p>
                                    {{ \Illuminate\Support\Str::limit($item->blog_descr, 55) }}
                                </p>

                            </div>

                        </div>

                    @empty

                        <div class="empty-state">
                            No blog posts found.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>


<style>

.dashboard-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.dashboard-header h2 {
    margin: 0;
    font-size: 26px;
    font-weight: 700;
}

.dashboard-header p {
    margin: 6px 0 0;
    color: #8b93a7;
}


.dashboard-card {
    background: #111827;
    border: 1px solid rgba(255,255,255,.06);
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 18px;
    min-height: 125px;
    transition: .25s ease;
}

.dashboard-card:hover {
    transform: translateY(-3px);
    border-color: rgba(56,189,248,.3);
}


.dashboard-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(14,165,233,.12);
    color: #38bdf8;
    font-size: 20px;
}


.dashboard-card span {
    display: block;
    color: #8b93a7;
    font-size: 13px;
    margin-bottom: 5px;
}

.dashboard-card h3 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    color: #fff;
}


.dashboard-section {
    background: #111827;
    border: 1px solid rgba(255,255,255,.06);
    border-radius: 16px;
    padding: 24px;
}


.section-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}

.section-heading h4 {
    margin: 0;
    color: #fff;
    font-size: 17px;
}

.section-heading p {
    margin: 5px 0 0;
    color: #7f889d;
    font-size: 13px;
}

.section-heading a {
    color: #38bdf8;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
}


.quick-actions {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}


.quick-action {
    padding: 18px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,.06);
    background: rgba(255,255,255,.025);
    color: #dce3f0;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: .2s ease;
}

.quick-action:hover {
    color: #38bdf8;
    border-color: rgba(56,189,248,.3);
    transform: translateY(-2px);
}

.quick-action i {
    color: #38bdf8;
}


.dashboard-table {
    width: 100%;
    border-collapse: collapse;
}

.dashboard-table th {
    text-align: left;
    color: #7f889d;
    font-size: 12px;
    font-weight: 600;
    padding: 12px 10px;
    border-bottom: 1px solid rgba(255,255,255,.06);
}

.dashboard-table td {
    padding: 14px 10px;
    color: #cbd5e1;
    font-size: 13px;
    border-bottom: 1px solid rgba(255,255,255,.04);
}


.project-name {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #fff;
    font-weight: 600;
}

.project-name img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 8px;
}


.table-action {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: rgba(56,189,248,.1);
    color: #38bdf8;
    text-decoration: none;
}


.blog-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.blog-item {
    display: flex;
    gap: 12px;
    padding: 12px;
    border-radius: 10px;
    background: rgba(255,255,255,.025);
}

.blog-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(56,189,248,.1);
    color: #38bdf8;
}

.blog-info h5 {
    margin: 0 0 4px;
    color: #fff;
    font-size: 13px;
}

.blog-info p {
    margin: 0;
    color: #7f889d;
    font-size: 12px;
}


.empty-state {
    text-align: center;
    padding: 30px !important;
    color: #6b7280 !important;
}


@media (max-width: 992px) {

    .quick-actions {
        grid-template-columns: repeat(2, 1fr);
    }

}


@media (max-width: 576px) {

    .dashboard-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .quick-actions {
        grid-template-columns: 1fr;
    }

}

</style>

@endsection

