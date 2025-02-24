@extends('layouts.auth')

@section('content')
    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div id="container-inside">
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
        </div>
        {{-- <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center bg-primary rounded">
                    <div class="row m-0">
                        <div class="col-md-5 bg-white sign-in-page-data">
                            <div class="sign-in-from">
                                <h1 class="mb-0 text-center">Sign in</h1>
                                <p class="text-center text-dark">Enter your email address and password to access admin
                                    panel.
                                </p>

                                @include('layouts.dashboard.alerts.danger-alert')

                                <form class="mt-4" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="email" type="email" class="form-control mb-0"
                                            id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <a href="#" class="float-right">Forgot password?</a>
                                        <input name= "password" type="password" class="form-control mb-0"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input name="remember" type="checkbox" class="custom-control-input"
                                                id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn-primary d-block w-100 mb-2">Sign
                                            in</button>
                                        <span class="text-dark dark-color d-inline-block line-height-2">Don't have an
                                            account? <a href="{{ route('register') }}">Sign up</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <style>
            /* Layout utama */
            .login-container {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f8f9fa;
                position: relative;
                overflow: hidden;
                /* Agar animasi tidak keluar area */
            }

            /* Background biru di tengah */
            .background-blue {
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 60%;
                /* Perbesar area biru */
                height: 100%;
                background: #153a6e;
                /* Warna biru */
                z-index: 1;
            }

            /* Kotak login */
            .login-box {
                position: relative;
                z-index: 2;
                background: white;
                padding: 2.5rem;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                width: 500px;
                /* Lebarkan form */
                max-width: 90%;
                text-align: center;
            }

            /* Form input styling */
            .form-group input {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 6px;
            }

            /* Tombol */
            .btn-primary {
                background-color: #153a6e;
                color: white;
                border: none;
                padding: 10px;
                width: 100%;
                border-radius: 6px;
                cursor: pointer;
            }

            /* Kotak-kotak animasi */
            .square {
                position: absolute;
                width: 50px;
                height: 50px;
                border: 2px solid rgba(255, 255, 255, 0.6);
                opacity: 0.7;
                animation: moveSquares 10s infinite linear;
            }

            /* Posisi awal kotak */
            .square:nth-child(1) {
                top: 10%;
                left: 15%;
                animation-duration: 12s;
            }

            .square:nth-child(2) {
                top: 40%;
                left: 60%;
                animation-duration: 14s;
            }

            .square:nth-child(3) {
                top: 70%;
                left: 30%;
                animation-duration: 10s;
            }

            .square:nth-child(4) {
                top: 20%;
                left: 80%;
                animation-duration: 16s;
            }

            .square:nth-child(5) {
                top: 80%;
                left: 50%;
                animation-duration: 13s;
            }

            /* Animasi pergerakan */
            @keyframes moveSquares {
                0% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-20px) rotate(180deg);
                }

                100% {
                    transform: translateY(0px) rotate(360deg);
                }
            }
        </style>

        <div class="login-container">
            <div class="background-blue">
                <!-- Kotak-kotak animasi -->
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
            </div>

            <div class="login-box">
                <h1>Sign in</h1>
                <p>Enter your email address and password to access admin panel.</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input name="email" type="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn-primary">Sign in</button>
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                </form>
            </div>
        </div>


    </section>
    <!-- Sign in END -->
@endsection
