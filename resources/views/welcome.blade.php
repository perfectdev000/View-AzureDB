<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Azure View</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <!-- Scripts -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            html, body {
                background-color: #fff;
                background-image: url("{{ asset('app-assets') }}/images/pages/home.jfif");
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
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
                font-size: 50px;
            }

            .links > a {
                color: #FFFF00;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #bbb;
                border-radius: 50%;
            }

            .m-b-md {
                margin-bottom: 30px;
                color:lightcoral;
            }
            .custom_div{
                box-shadow: 0 4px 20px 0 rgba(0,0,0,0.5), 0 4px 20px 0 rgba(0,0,0,0.5);
            }
            .carousel-caption >h2,h1{
                color:darkblue;
                background-color: rgba(255,255,255,0.6);
            }
            .item >img{
                opacity: 1.1;
            }
            .shadow-hext {
                font-weight: 800;
                text-shadow:0px 0px 20px lightgoldenrodyellow;
                color: #FF4500;
            }
            div.flex-center{
                opacity: 0.9 !important;
                background-color: white !important;
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
                <div class="title m-b-md shadow-hext" >
                    Azure Blob Storage & Sql Database
                </div>
                <div class="row align-items-center custom_div">
                    <div id="myCarousel" class="carousel slide  align-items-center" data-ride="carousel"  style="width:1000px;height:500px;margin-left: auto;margin-right: auto;">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" >
                            <div class="item active">
                                <img src="{{ asset('app-assets') }}/images/pages/gojo.jpg" alt="home gojo"  style="height:500px !important; width:1000px !important">
                                <div class="carousel-caption">
                                    <h1>Gojo</h1>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('app-assets') }}/images/pages/pactiv.jpg" alt="home pactiv"  style="height:500px !important; width:1000px !important">
                                <div class="carousel-caption">
                                    <h1>Pactiv</h1>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('app-assets') }}/images/pages/spartan.jpg" alt="home spartan"  style="height:500px !important; width:1000px !important">
                                <div class="carousel-caption">
                                    <h1>Spartan</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
