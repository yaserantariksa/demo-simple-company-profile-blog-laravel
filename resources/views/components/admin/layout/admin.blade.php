<x-admin.layout.main>

    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    {{-- begin:Body --}}

    <body class="layout-fixed sidebar-expand-lg bg-body-tertairy">
        {{-- include:Sweet Alert --}}
        @include('sweetalert::alert')
        {{-- end include: Sweet Alert --}}
        {{-- begin:App Wrapper --}}
        <div class="app-wrapper">
            <x-admin.sidebar />
            <x-admin.navbar />
            <main class="app-main">
                <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">{{ $page }}</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-end">
                                    <li class="breadcrumb-item"><a href="{{ $homeurl }}">{{ $home }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $page }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::App Content Header-->
                {{-- begin:App Content --}}
                <div class="app-content">
                    {{-- begin:Container --}}
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                    {{-- end:Container --}}
                </div>
                {{-- end:App Content --}}
            </main>
            <x-admin.footer />
        </div>
        {{-- end:App Wrapper --}}

        <x-admin.scripts />

    </body>
    {{-- end:Body --}}

</x-admin.layout.main>
