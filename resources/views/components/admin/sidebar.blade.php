<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    {{-- begin:Sidebar Brand --}}
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-text fw-light nav-link fs-2">Blog</a>
    </div>
    {{-- end:Sidebar Brand --}}

    {{-- begin:Sidebar Wrapper --}}
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">DASHBOARD</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ active('dashboard') }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">ARTICLES</li>
                <li class="nav-item">
                    <a href="{{ route('articles.index') }}" class="nav-link {{ active('articles.index') }}">
                        <i class="nav-icon bi bi-journal"></i>
                        <p>Articles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('articles.create') }}" class="nav-link">
                        <i class="nav-icon bi bi-journal-plus"></i>
                        <p>Add Article</p>
                    </a>
                </li>
                <li class="nav-header">TAGS</li>
                <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link {{ active('tags.index') }}">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Tags</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    {{-- end:Sidebar Wrapper --}}
</aside>
{{-- end:Sidebar --}}
