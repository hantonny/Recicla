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
  <div class="menu">
  <nav>
          <a href="home" class="text-decoration-none"><p class="titulo-nav-menu">recicla</p></a>
          <div class="menu-nav">
            <a href="sobre" class="menu-item text-decoration-none">Sobre</a>
            <a href="" class="menu-item text-decoration-none">Vantagens</a>
            <a href="" class="menu-item text-decoration-none">Login</a>
            <a class="menu-botao text-decoration-none"href="localiza"><button class="botao">LOCALIZAR</button></a>
          </div>
      </nav>
  </div>
  <section>
    @yield('content')
  </section>
  <footer class="rodape">
    <h1 class="logo-footer">recicla</h1>
    <p class="autor-footer">© 2019 Hantonny Korrea. Todos os direitos reservados. </p>
    <div class="menu-footer">
      <a href="sobre" class="menu-item-footer text-decoration-none">Sobre</a>
      <a href="" class="menu-item-footer text-decoration-none">Vantagens</a>
      <a href="" class="menu-item-footer text-decoration-none">Login</a>
    </div>
  </footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>