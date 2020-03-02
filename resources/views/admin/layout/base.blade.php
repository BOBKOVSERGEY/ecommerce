<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - @yield('title')</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

@include('includes.admin-sidebar')

<div class="off-canvas-content" data-off-canvas-content>
    <div class="dashboard">
        <div class="row expanded">
            <div class="title-bar">
                <div class="title-bar-left">
                    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
                    <span class="title-bar-title">{{  getenv('APP_NAME') }}</span>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</div>
<script src="/js/lib.js"></script>
<script src="/js/main.js"></script>
</body>
</html>