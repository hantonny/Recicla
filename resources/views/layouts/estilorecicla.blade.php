<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
      <script type="text/javascript" src="{{asset('js/funcaolocal.js')}}"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark top bg-success">
        <a class="navbar-brand" href="{{route('home')}}"><h1 class="titulo-nav-menu"><strong>Recicla</strong></h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="menu-item  text-decoration-none" href="{{route('sobre')}}">Sobre<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="menu-item  text-decoration-none" href="{{route('login')}}">Login</a>
            </li>
          </ul>
            <a href="{{route('localiza')}}">
              <button class="btn btn-primary my-2 my-sm-0" type="submit"><strong>LOCALIZAR</strong></button></a>
        </div>
      </nav>
    </header>
  <section>
    @yield('content')
  </section>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>