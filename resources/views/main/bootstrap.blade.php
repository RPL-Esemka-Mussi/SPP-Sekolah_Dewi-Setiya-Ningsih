<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spp Sekolah</title>
    <link href="{{ asset ('css/bootstrap.min.css')}}" rel="stylesheet"> 
    @yield('css')
  </head>
  <body>
    @if(Request::segment(1) == 'login' || Request::segment(1) == 'logout' )
    @else
  <nav class="navbar navbar-expand-lg bg-warning ">
  <div class="container">
    <a class="navbar-brand" href="#">Spp Sekolah</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
      <a class="nav-link {{ Request::segment(1) == 'home' ? 'active' : ''}}" aria-current="page" href="{{url('/home')}}">Home</a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) == 'user' ? 'active' : ''}}"  href="{{url('/user')}}">User</a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) == 'siswa' ? 'active' : ''}}" href="{{url('/siswa')}}">Siswa</a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) == 'kelas' ? 'active' : ''}}" href="{{url('/kelas')}}">Kelas</a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) == 'spp' ? 'active' : ''}}" href="{{url('/spp')}}">Spp</a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) == 'pembayaran' ? 'active' : ''}}" href="{{url('/pembayaran')}}">Pembayaran</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            pinaa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{url('login')}}">Logout</a></li>
          </ul>
        </li>

</ul>
    </div>
  </div>
</nav>
@endif
@yield('content')
    <script src="{{ asset ('js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html> 