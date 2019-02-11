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
                text-align: center;
            }

            .title {
                font-size: 34px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* Blog CSS starts*/
            body {
                font-family: Arial;
                padding: 20px;
                background: #f1f1f1;
            }

            /* Header/Blog Title */
            .header {
                padding: 10px;
                font-size: 20px;
                text-align: center;
                background: white;
            }

            /* Create two unequal columns that floats next to each other */
            /* Left column */
            .leftcolumn {   
                float: left;
                width: 100%;
            }

            /* Add a card effect for articles */
            .card {
                background-color: white;
                padding: 20px;
                margin-top: 20px;
            }
            /* Blog CSS ends*/


        </style>
    </head>
    <body>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                <div class="header">
                    <h5>{{$blogDetails->title}}</h5>
                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <div class="card">
                            <p>{{$blogDetails->description}}</p>
                        </div>
                    </div>

                    <div class="leftcolumn">
                        <div class="card">

                            <div id="commentsbox">
                                <span>Comments and Responses</span>

                                <br>
                                <br>

                                <div id="comment-form">
                                    <div id="respond" class="rounded">

                                        <form action="{{url('comment?id='.$blogDetails->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <!--                                            <div class="form-row">
                                                                                            <input type="text" placeholder="Name (required)" name="author" value="" tabindex="1" aria-required="true">
                                                                                        </div>
                                                                                        <div class="form-row"> 
                                                                                            <input type="text" placeholder="Mail (will not be published) (required)" name="email" size="22" tabindex="2" aria-required="true">
                                                                                        </div>-->
                                            <div class="form-row">
                                                <textarea name="comment" placeholder="Message" cols="50" rows="5" tabindex="4" required></textarea>
                                            </div>

                                            <br>

                                            <input name="submit" type="submit" tabindex="5" value="Submit Comment">             
                                        </form>
                                    </div>
                                </div>                                                                          
                            </div>

                        </div>
                    </div>

                    @if(isset($commentDetails) && !empty($commentDetails)) 
                    <div class="leftcolumn">
                        @foreach($commentDetails as $key => $value)
                        <div class="card">
                            <div>
                                <div>
                                    <div>
                                        <span>{{$value->updated_at}}</span>		
                                    </div>
                                    <p>{{$value->comment}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
    </body>
</html>
