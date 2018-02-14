<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oficina OnLine</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-image: url("../images/cars.jpg");
                color: #efefef;
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
                font-size: 84px;
            }

            .links > a {
                color: #efefef;
                padding: 0 25px;
                font-size: 14px;
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
                    @if (Auth::check())

                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Novo Aqui? Registre-se!</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Oficina OnLine
                </div>

                <div class="links">
                      @if (Auth::check())
                        @if (auth()->user()->id==2)
                        <a href="{{ url('/home') }}">Acesso Restrito</a>
                        @else
                        <a href="{{ url('/home') }}">Acesso do Cliente</a>
                        @endif
                      @else
                      <a href="{{ url('/home') }}">Acesso Restrito</a>
                      <a href="{{ url('/home') }}">Acesso do Cliente</a>
                      @endif


                </div>



            </div>



        </div>

        <div class="container well col-sm-6 col-sm-offset-3" style="background-color: #030303;" align="center">
          <p> Oficina OnLine ©. Todos os direitos reservados.</p>
        </div>


    </body>
</html>
