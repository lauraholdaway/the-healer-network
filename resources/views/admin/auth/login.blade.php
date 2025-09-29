
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealarNetwork</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.png') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/custome-css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/custome-css/dashboard.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/custome-css/all.min.css') }}" /> <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
</head>

<body style="font-family: 'Poppins', sans-serif;">
<style>
    .form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.8;
    color: var(--bs-body-color);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: var(--bs-body-bg);
    background-clip: padding-box;
    border:1px solid black !important;
    border-radius: 0px;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.card {
    border:1px solid #cfc8d8 !important;

}
</style>
    <div class="container mt-5">
        <div class="row my-4">

            {{-- Session Status --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->has('email') || $errors->has('password'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('email') ?? $errors->first('password') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-6 offset-md-3">
                <div>
                    <h3 class="fw-bold my-2 text-center">LOGIN</h3>
                </div>
                <div class="card p-md-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- Email Address --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Username or email address ') }} <b
                                    class="text-danger">*</b></label>
                            <input type="email" name="email" id="email" class="form-control " required autofocus
                                autocomplete="username">
                        </div>

                        {{-- Password --}}
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">
                                {{ __('Password') }} <b class="text-danger">*</b>
                            </label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" required
                                    autocomplete="current-password" style="border-right: 1px solid white !important">
                                <button type="button" class="bg-white text-dark rounded-0 " style="border:1px solid black" id="togglePassword">
                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>
                        {{-- Remember Me --}}
                        {{-- Actions --}}
                        <div class="d-flex justify-content-start align-items-center">
                            <button type="submit" class="btn btn-light rounded-1 fw-bold" style="background-color:#e9e6ed">
                                {{ __('Log in') }}
                            </button>
                            <div class="mb-3 form-check mx-5 mt-2">
                                <input type="checkbox" class="form-check-input fs-4" id="remember_me" name="remember">
                                <label class="form-check-label fs-5" for="remember_me">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                        </div>
                        <div class="my-2 pt-md-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    <u class="fw-bold">{{ __('Lost your password?') }}</u>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <script>
    document.getElementById("togglePassword").addEventListener("click", function () {
        const password = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (password.type === "password") {
            password.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            password.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    });
</script>


    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('navigation').classList.toggle('d-none');
        });
    </script>
</body>
</html>
