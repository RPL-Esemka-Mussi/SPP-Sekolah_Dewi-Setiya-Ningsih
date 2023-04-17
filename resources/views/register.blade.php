<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spp Sekolah</title>
    <link href="{{ asset ('css/bootstrap.min.css')}}" rel="stylesheet"> 
    <link href="{{ asset ('css/login.css')}}" rel="stylesheet"> 
  </head>
  <body>

  <div class="row justify-content-center">
  <div class="col-md-5">
  <main class="form-registration w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
  <form>

  <div class="form-floating">
      <input type="text" name="name" class="form-control" id="name" placeholder="name">
      <label for="name">Name</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" id="username" placeholder="username">
      <label for="username">Username</label>
    </div>

    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="email">
      <label for="email">Email address</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
</div>
</div>
    <script src="{{ asset ('js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>