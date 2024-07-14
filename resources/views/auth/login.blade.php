<x-admin.layout.main>

    <x-slot:title>
        Login
    </x-slot:title>

    {{-- begin:Body --}}

    <body class="login-page bg-body-secondary">
        {{-- begin:Login Box --}}
        <div class="login-box">
            <div class="card card-outline card-primary">
                {{-- begin:Login Card Header --}}
                <div class="card-header">
                    <a href="" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"
                        style="text-decoration: none;">
                        <h1 class="mb-0"> Blog Admin</h1>
                    </a>
                </div>
                {{-- end:Login Card Header --}}
                {{-- begin:Login Card Body --}}
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    @if (count($errors) != 0)
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li class="text-danger">{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="loginEmail" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="" placeholder="">
                                <label for="loginEmail">Email</label>
                            </div>
                            <div class="input-group-text">
                                <span class="bi bi-envelope"></span>
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="loginPassword" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="" placeholder="">
                                <label for="loginPassword">Password</label>
                            </div>
                            <div class="input-group-text">
                                <span class="bi bi-lock-fill"></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3">Sign In</button>
                        </div>
                    </form>
                </div>
                {{-- end:Login Card Body --}}
            </div>
        </div>
        {{-- end:Login Box --}}

        <x-admin.scripts />

    </body>
    {{-- end:Body --}}

</x-admin.layout.main>
