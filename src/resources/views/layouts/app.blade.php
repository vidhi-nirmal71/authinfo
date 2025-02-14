<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="This is an Auth information tool">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom CSS (optional) -->
    <style>
        body {
            padding-top: 70px; /* Adjust based on navbar height */
        }
        .navbar {
            height: 60px; /* Adjust height if needed */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.25rem;
            padding-left: 15px; /* Ensures it stays on the left */
        }       
        .container {
            background: #F8F9FA;
        }
        .card {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card-header {
            padding: 15px;
        }

        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
        }

        .page-link {
            position: relative;
            display: block;
            color: #  7a8d;
            background-color: #f0f2f4;
            border: 0px solid #d9dee3;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        @media (prefers-reduced-motion: reduce) {
        .page-link {
            transition: none;
        }
        }

        .page-link {
            color: black !important;
            background: #f6f6f6 !important;
        }
        .page-item.active .page-link {
            color: black !important;
            background: #d6d6d6 !important;
        }
        .page-link:hover {
            z-index: 2;
            color: #697a8d;
            background-color: #e1e4e8;
            border-color: rgba(67, 89, 113, 0.3);
        }
        .page-link:focus {
            z-index: 3;
            color: #697a8d;
            background-color: #e1e4e8;
            outline: 0;
            box-shadow: none;
        }

        .page-item:not(:first-child) .page-link {
            margin-left: 0.1875rem;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: rgba(105, 108, 255, 0.08);
            border-color: rgba(105, 108, 255, 0.08);
        }
        .page-item.disabled .page-link {
            color: #a1acb8;
            pointer-events: none;
            background-color: #f7f8f9;
            border-color: rgba(67, 89, 113, 0.3);
        }

        .page-link {
            padding: 0.525rem 0.7125rem;
        }

        .page-item .page-link {
            border-radius: 0.25rem;
        }

        .pagination-lg .page-link {
            padding: 0.9375rem 0.5rem;
            font-size: 1rem;
        }
        .pagination-lg .page-item .page-link {
            border-radius: 0.5rem;
        }

        .pagination-sm .page-link {
            padding: 0.375rem 0.25rem;
            font-size: 0.75rem;
        }
        .pagination-sm .page-item .page-link {
        border-radius: 0.25rem;
        }

        .badge {
            display: inline-block;
            padding: 0.52em 0.593em;
            font-size: 0.8125em;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
        .badge:empty {
            display: none;
        }

        .pagination-lg .page-link,
        .pagination-lg > li > a:not(.page-link) {
            min-width: calc(
                2.875rem + 0px
            );
        }

        .pagination-lg > .page-item.first .page-link, .pagination-lg > .page-item.last .page-link, .pagination-lg > .page-item.next .page-link, .pagination-lg > .page-item.prev .page-link, .pagination-lg > .page-item.previous .page-link {
            padding-top: 0.853rem;
            padding-bottom: 0.853rem;
        }

        .pagination-sm .page-link,
        .pagination-sm > li > a:not(.page-link) {
            min-width: calc(
                1.5rem + 0px
            );
        }
        .pagination-sm .page-link .tf-icon,
        .pagination-sm > li > a:not(.page-link) .tf-icon {
            font-size: 0.9375rem;
        }

        .pagination-sm > .page-item.first .page-link, .pagination-sm > .page-item.last .page-link, .pagination-sm > .page-item.next .page-link, .pagination-sm > .page-item.prev .page-link, .pagination-sm > .page-item.previous .page-link {
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
        }

        ul.pagination{
            margin-bottom: 0;
        }

    </style>
    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Custom JS (optional) -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
        setTimeout(() => {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        }, 2000);
    </script>
    @yield('head')
    @yield('script')
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow bg-white">
        <div class="container-fluid">
            <!-- Left-aligned title -->
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
    </nav>

    <main class="px-5 pt-1 mt-2">
        @yield('content')
    </main>
</body>
</html>
