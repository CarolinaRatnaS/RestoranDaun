<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restoran Daun</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        <a href="{{ Route('makanan.index') }}">Home</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('images/logo.png') }}" style="height: 240px; width: auto;" alt="Restoran Daun">
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Web Engineering - Carolina Ratna Sari - 2015101780</a>
                    <a href="https://instagram.com/carolinaratnas">Instagram</a>
                    <a href="https://api.whatsapp.com/send?phone=62895332868929&text=Halo%20Carolina%20Ratna%20Sari.">Whatsapp</a>
                    <a href="https://www.linkedin.com/in/carolina-ratna-sari/">LinkedIn</a>
                    <a href="https://github.com/CarolinaRatnaS/RestoranDaun">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
