<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid vh-100 w-100" id="start">
        <div class="row  w-100 h-100">
            <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="card animate__animated animate__fadeIn loginCard">
                        <div class="card-body">
                            <div class="text-center bg-white" >
                                <h4 mb-3>Admin Panel</h4>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    {{--                    Email Address--}}
                                    <x-input id="email" class="form-control-lg mb-3" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
                                    <x-input id="password" class="form-control-lg mb-3" type="password" name="password" :value="old('password')" placeholder="Password" required autofocus />
                                    <x-button class="btn-lg btn-success w-100 mb-3">
                                        {{ __('SING IN') }}
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
