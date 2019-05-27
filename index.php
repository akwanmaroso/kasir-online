
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="inc/css/bootstrap.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="inc/css/floating.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="POST" action="inc/cek_login.php">
      <div class="panel panel-primary">
          <div class="panel-heading text-center">
              <h3><i class="fa fa-store" aria-hidden="true"></i> RestoranKu</h3>
              <h4>Login System</h4>
              <p><i class="fa fa-road"></i> Jl. Kerajalembah, BTN Kelapa Gading No.P14</p>
              <p><i class="fa fa-phone"></i> 081243139460</p>
          </div>
          <div class="panel-body">
              <br>
              <div class="alert alert-success">
                  Masukan Username dan Password dengan Benar!
              </div>
              <div class="input-group">
                  <span class="input-group-addon">Username</span>
                  <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
              </div>
              <br>
              <div class="input-group">
                  <span class="input-group-addon">Password</span>
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required>
              </div>
              <br>
              <input type="submit" class="btn btn-block btn-primary" value="Login">
          </div>
      </div>
    </form>
</body>
</html>
