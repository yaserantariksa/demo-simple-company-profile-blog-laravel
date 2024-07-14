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
                {{ $slot }}
            </main>
            <x-admin.footer />
        </div>
        {{-- end:App Wrapper --}}

        <x-admin.scripts />

    </body>
    {{-- end:Body --}}

</x-admin.layout.main>
