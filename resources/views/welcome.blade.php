<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="/master_responses/get_master_responses">Master Responses</a>
                    <a href="/device_alerts/get_device_alerts">Alerts</a>
                </div>
            </div>
        </div>

    <script>
        var accessTokenString = localStorage.getItem("token");
        var gitlabUrl = "http://gitlab.getfoundeugene.com/oauth/authorize?client_id=c68b38e2c326e748875783ba53dc64c4a366f48660dd94778d738591f159f25a&redirect_uri=https://tolocalhost.com/gitlab/callback&response_type=code&state=test&scope=read_user+openid";

        if (!accessTokenString || accessTokenString.length === 0)
        {
            window.location.href=gitlabUrl;
        }
        try{
            let fullResult = JSON.parse(accessTokenString);
            if (!fullResult.access_token || fullResult.access_token.length === 0)
            {
                window.location.href=gitlabUrl;
            }
        } catch {
            window.location.href=gitlabUrl;
        }
    </script>
    </body>
</html>
