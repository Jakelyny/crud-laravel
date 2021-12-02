<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agenda</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #92b8b2;
            }
            .button {
                background-color: #5b958b;
                border: none;
                color: white;
                padding: 8px 40px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s;
                transition-duration: 0.4s;
            }
            .button:hover {
                background-color: rgb(6, 180, 142);
            }

            img {
                width: 60%;
                margin-left: 20%;
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="button">Agenda</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div>
        <div class="row marcador align-items-center">
                <div class="col mx-auto text-center">
                    <img src="/img/agenda.png">
                </div>
        </div>
    </body>
</html>
