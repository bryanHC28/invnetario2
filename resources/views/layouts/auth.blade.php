<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/sumapp.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome5.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style>
        body,
        html {
            background: #52caca;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #5086C1, #5086C1);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #5086C1, #5086C1);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .card {
            border-radius: 35px;
            border-top: 3px solid rgb(0, 0, 0);
        }

        .brand-logo {
            max-height: 100px;
        }

        #g-recaptcha-response {
            display: block !important;
            position: absolute;
            margin: -78px 0 0 0 !important;
            width: 302px !important;
            height: 76px !important;
            z-index: -999999;
            opacity: 0;
        }

    </style>

</head>

<body>
    <div class="container mt-4">
        <div class="pb-5">
            <div class="mx-auto" style="max-width: 600px">
                <div class="text-center text-light mb-2">
                    <div>
                        <img class="brand-logo" src="{{ asset('img/sumapp.png') }}" alt="SuMapp">
                    </div>
                    <div class="mt-2">

                    </div>
                    <hr>
                    <div class="mb-3">
                        <h3>Equipamiento</h3>
                    </div>
                    {{-- @if (config('app.debug') == true)
                        <div class="my-3 p-2 alert alert-warning">
                            <h3>Modo de depuración activado</h3>
                        </div>
                    @endif --}}
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')
    <script>
        window.onload = function() {
            var $recaptcha = document.querySelector('#g-recaptcha-response');

            if ($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }
        };
    </script>
    @include('components.SweetAlert2')
    @include('components.ConsoleLog')
</body>

</html>
