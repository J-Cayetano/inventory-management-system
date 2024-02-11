<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title') | {{ config('app.name') }} Inventory Management System</title>
    <link rel="shortcut icon" href="{{ asset('static/logo.png') }}" />
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    @yield('styles')
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>

    <div class="page">
        @include('layouts.tool-bar')
        @include('layouts.navigation-bar')
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                @yield('title')
                            </h2>
                            <p>Greetings, {{ Auth::user()->name }}!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @if (session('success'))
                        <div class="alert alert-success fw-bolder fs-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger fw-bolder fs-3">
                            {{ session('error') }}
                        </div>
                    @endif
                    @yield('contents')
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright © {{ date('Y') }}
                            <a class="link-secondary">Stephanie Yanto</a>.
                            All rights reserved.
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
