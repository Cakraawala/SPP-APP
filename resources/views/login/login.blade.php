<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/fontawesome.free/.css">
    <link href="/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Pembayaran SPP | Login</title>
    <style>
        * {
            overflow: hidden;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="img/capture.png"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="/authenticate">@csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <h3 class="mb-0 me-3">Pembayaran SPP</h3>

                        </div>

                        <div class="divider d-flex align-items-center my-4">

                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="username" class="form-control form-control-lg"
                                placeholder="Username" @if (Cookie::has('username'))  value="{{ Cookie::get('username') }}"
                                @endif>
                            {{-- <label class="form-label" for="username">Username</label> --}}
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Password" @if(Cookie::has('username')) value="{{ Cookie::get('password') }}" @endif>
                            {{-- <label class="form-label" for="password">Password</label> --}}
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" @if(Cookie::has('username')) checked @endif   name="remember" value="1" id="remember" />
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            {{-- <a href="#!" class="text-body">Forgot password?</a> --}}
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 mt-3 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Created by. Angger Cakra Wicaksono. 2023
            </div>
            <!-- Copyright -->
            <!-- Right -->
        </div>
    </section>
</body>

</html>
