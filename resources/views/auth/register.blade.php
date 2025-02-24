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
                                <h1 class="mb-0 text-center">Sign Up</h1>
                                <p class="text-center text-dark">Enter your email address and password to access admin
                                    panel.</p>

                                @include('layouts.dashboard.alerts.danger-alert')

                                <form class="mt-4" action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Full Name</label>
                                        <input name="name" type="text" class="form-control mb-0"
                                            id="exampleInputEmail1" placeholder="Your Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Email address</label>
                                        <input name="email" type="email" class="form-control mb-0"
                                            id="exampleInputEmail2" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control mb-0"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input name="password_confirmation" type="password" class="form-control mb-0"
                                            id="password_confirmation" placeholder="Password">
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">I accept <a
                                                    href="#">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn-primary d-block w-100 mb-2">Sign Up</button>
                                        <span class="text-dark d-inline-block line-height-2">Already Have Account ? <a
                                                href="{{ route('login') }}">Log In</a></span>
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
            html,
            body {
                height: 90%;
                margin: 0;
                padding: 0;
                background-color: #153a6e;
                /* Background full biru */
            }

            .container {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            /* Form Sign Up diperlebar dan diposisikan di tengah */
            .sign-in-page-data {
                position: relative;
                background: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                width: 550px;
                /* Lebarkan form */
                max-width: 90%;
                text-align: center;
                z-index: 2;
            }

            /* Form input styling */
            .form-group input {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 6px;
                font-size: 16px;
            }

            /* Tombol */
            .btn-primary {
                background-color: #153a6e;
                color: white;
                border: none;
                padding: 14px;
                width: 100%;
                border-radius: 6px;
                cursor: pointer;
                font-size: 16px;
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

            /* Posisi kotak agar lebih rapi */
            .square:nth-child(1) {
                top: 10%;
                left: 20%;
                animation-duration: 12s;
            }

            .square:nth-child(2) {
                top: 40%;
                left: 70%;
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

        <div class="container">
            <!-- Kotak-kotak animasi -->
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>

            <div class="sign-in-page-data">
                <h1 class="mb-0 text-center">Sign Up</h1>
                <p class="text-center text-dark">
                    Enter your email address and password to access the admin panel.
                </p>

                @include('layouts.dashboard.alerts.danger-alert')

                <form class="mt-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Full Name</label>
                        <input name="name" type="text" class="form-control mb-0" id="exampleInputEmail1"
                            placeholder="Your Full Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email address</label>
                        <input name="email" type="email" class="form-control mb-0" id="exampleInputEmail2"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control mb-0" id="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input name="password_confirmation" type="password" class="form-control mb-0"
                            id="password_confirmation" placeholder="Password">
                    </div>
                    <div class="d-inline-block w-100">
                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                I accept <a href="#">Terms and Conditions</a>
                            </label>
                        </div>
                    </div>
                    <div class="sign-info text-center">
                        <button type="submit" class="btn-primary d-block w-100 mb-2">Sign Up</button>
                        <span class="text-dark d-inline-block line-height-2">
                            Already Have Account? <a href="{{ route('login') }}">Log In</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>


    </section>
    <!-- Sign in END -->
@endsection
