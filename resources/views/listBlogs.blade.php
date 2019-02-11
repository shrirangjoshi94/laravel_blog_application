<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                /*text-align: center;*/
            }

            .title {
                font-size: 34px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
    </head>

    <body>

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        <!--<div class="flex-center position-ref full-height">-->
        <div class="flex-center position-ref">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif

            <div class="content">

                <div class="container">

                    <div class="title m-b-md">
                        Laravel Blog Application
                    </div>

                    <div class="m-b-md">
                        <a href="{{url("blog/create")}}"><button type="btn">Add New Blog</button></a>
                    </div>

                    <div id="blog" class="row"> 
                        @foreach($blogList as $key => $value)
                        <div class="col-md-10">
                            <h1>{{$value->title}}</h1>
                            <article>
                                <p>
                                    {{str_limit($value->description,500)}}       
                                </p>
                            </article>
                            <a class="btn pull-right" href="{{url('blog/'.$value->id)}}">READ MORE</a> 
                        </div>
                        @endforeach
                        <div class="col-md-12 "></div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
