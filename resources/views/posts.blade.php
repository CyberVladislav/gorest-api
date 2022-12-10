<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles -->

</head>
<header id="header" data-fullwidth="true">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo"> <a href="{{ asset('/') }}"><span class="logo-default">Main</span></a> </div>
            <!--End: Logo-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="{{ asset('home') }}">Home</a></li>
                            <li><a href="{{ asset('users') }}">Users</a></li>
                            <li><a href="{{ asset('posts') }}">Posts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif


    <!-- Page title -->
        <section id="page-title" class="page-title-classic" style="background-image:url({{ asset('/images/employee.jpeg') }});background-size: cover;color: white;">
            <div class="container">
                <div class="page-title">
                    <h1>Users</h1>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Page Content -->
        @if(session('success'))
            <div class="text-center alert alert-success" style="z-index: auto;">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="text-center alert alert-danger" style="z-index: auto;">
                {{ session('error') }}
            </div>
        @endif
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="d-flex flex-wrap justify-content-around">
                            <h4>Users table</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered nobottommargin">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>UserId</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post['id'] }}</td>
                                        <td>{{ $post['user_id'] }}</td>
                                        <td>{{ $post['title'] }}</td>
                                        <td>{{ $post['body'] }}</td>
                                        <td>
                                            @foreach($post['comments'] as $comment)
                                                {{ $comment['body'] }} <br><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Page Content -->
</div>

<!--Plugins-->
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<!--Template functions-->
<script src="js/functions.js"></script>
</body>
</html>
