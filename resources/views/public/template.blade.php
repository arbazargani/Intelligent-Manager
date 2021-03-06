<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    @yield('title')
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.16/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.16/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.16/dist/js/uikit-icons.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alfg/ping.js@0.2.2/dist/ping.min.js" type="text/javascript"></script>


    <style>
        body {
            background: lightgray;
            height: 100vh;
        }
        .bg-lightgray {
            background: lightgray;
        }
        .alert-box {
            background: #f4645f;
            color: #fff;
            border-radius: 3px;
            margin: 10px 0 20px;
            padding: 10px;
        }

        .info-box {
            background: #3498db;
            color: #fff;
            border-radius: 3px;
            margin: 10px 0 20px;
            padding: 10px;
        }

        .warning-box {
            background: #e67e22;
            color: #fff;
            border-radius: 3px;
            margin: 10px 0 20px;
            padding: 10px;
        }

        .success-box {
            background: #27ae60;
            color: #fff;
            border-radius: 3px;
            margin: 10px 0 20px;
            padding: 10px;
        }

        .spaned {
            background: #fefefe;
            color: gray;
            padding: 0 1.5%;
            border-radius: 3px;
            color: black;
        }
        .text-transform-unset {
            text-transform: unset !important;
        }
        .led {
            height: 10px;
            width: 10px;
            background-color: #4cd137;
            border-radius: 50%;
            display: inline-block;
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
                        <a href="{{ route('Services > List') }}" class="uk-link-reset">
                            <span uk-icon="database"></span>
                            <span class="uk-visible@m">&nbsp;Services</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add customer; pos: top">
                        <a href="{{ route('Customers > Add') }}" class="uk-link-reset">
                            <span uk-icon="plus"></span>
                            <span class="uk-visible@m">&nbsp;Customer</span>
                        </a>
                    </p>
                </div>
                <div>
                    <p uk-tooltip="title: Add service; pos: top">
                        <a href="{{ route('Services > Add') }}" class="uk-link-reset">
                            <span uk-icon="plus-circle"></span>
                            <span class="uk-visible@m">&nbsp;Service</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-expand uk-padding-large uk-padding-remove-top bg-lightgray">
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            @if(Auth::check())
            <div class="uk-margin-small-bottom uk-child-width-expand@m" uk-grid>
                <div>
                    <span class="uk-text-meta">logged in: {{ Auth::user()->name }}</span>
                </div>
                <div>
                    <span class="led" id="cryptiner-led"></span>
                    <span>Cryptiner</span>
                    <span id="ping-cryptiner"></span>
                </div>
                <div>
                    <span class="led" id="ketabnews-led"></span>
                    <span>Ketabnews</span>
                    <span id="ping-ketabnews"></span>
                </div>
            </div>
            @endif
            @yield('content')
            <div id="spinner" class="uk-text-center" style="display: none">
                <div uk-spinner></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        function CheckPing(index, url) {
            var p = new Ping();
            p.ping(url, function(err, data) {
                if (err) {
                    console.log("error loading " + index + " resources");
                    data = data + " " + err;
                    document.getElementById(index+'-led').style.backgroundColor = '#e74c3c';
                }
                document.getElementById("ping-"+index).innerHTML = data;
            });
        }
        CheckPing('ketabnews', 'https://ketabnews.com');
        CheckPing('cryptiner', 'https://cryptiner.com/');
    </script>
</body>
</html>