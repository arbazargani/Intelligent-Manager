<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.16/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.16/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.16/dist/js/uikit-icons.min.js"></script>
    <style>
        body {
            background: lightgray;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="uk-container uk-container-expand uk-padding-large">
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <div class="uk-child-width-expand uk-text-center" uk-grid>
                <div>
                    <p>
                        <a href="{{ route('Index') }}" class="uk-link-reset">
                            <span><img src="https://lumen.laravel.com/img/favicons/favicon-32x32.png" alt="" srcset="" style="border-radius: 5px; filter: black; filter: grayscale(20%)"></span>
                            <span class="uk-visible@m">&nbsp;{{ env('APP_NAME') }}</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Customers; pos: top">
                        <a href="{{ route('Customers > List') }}" class="uk-link-reset">
                            <span uk-icon="users"></span>
                            <span id="Data:Customers" class="uk-visible@m">&nbsp;Customers</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Services; pos: top">
                        <span uk-icon="database"></span>
                        <span class="uk-visible@m">&nbsp;<a href="#" class="uk-link-reset">Services</a></span>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add customer; pos: top">
                        <a href="#" class="uk-link-reset">
                            <span uk-icon="plus"></span>
                            <span class="uk-visible@m">&nbsp;Customer</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add service; pos: top">
                        <a href="#" class="uk-link-reset">
                            <span uk-icon="plus-circle"></span>
                            <span class="uk-visible@m">&nbsp;Service</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-expand uk-padding-large uk-padding-remove-top">
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <div class="uk-margin-small-bottom">
                <span class="uk-text-meta">logged in: {{ Auth::user()->name }}</span>
            </div>
            @yield('content')
            <div id="spinner" class="uk-text-center" style="display: none">
                <div uk-spinner></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>