<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Package Received | Login</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet"> 
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        @if (session('error'))
          <div class="alert alert-danger alert-dismissible">
              {{ session('error') }}
          </div>
      @endif
      @if (session('success'))
          <div class="alert alert-success alert-dismissible">
              {{ session('success') }}
          </div>
      @endif
          <section class="login_content">
            <form method="post" action="{{ url('login') }}">
              {{ csrf_field() }}
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" autofocus="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
