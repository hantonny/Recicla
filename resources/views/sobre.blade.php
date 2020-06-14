@extends('layouts.estilorecicla')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 mb-5">
      <h1 class="display-4"><strong>Materias que pode ser reciclados.</strong></h1>
      <p class="p_sobre text-justify">O ideal é que esses itens sejam devolvidos às lojas ou fabricantes, que os encaminharão para um local que realiza a reciclagem do lixo eletrônico. Se o fabricante não oferecer essa opção, você pode procurar por alguma cooperativa local que faça o mesmo processo.</p>
    </div>
      <div id="carouselExampleControls" class="carousel slide carrosel" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
          <div class="card-body">
          <h5 class="card-title">COMPUTADORES E MONITORES</h5>
          <p class="card-text"><span class="span_texto">O</span>s computadores apresentam muitos componentes diferentes entre si. Quando devidamente encaminhados para um local apropriado, esses componentes serão separados para ser reciclados individualmente. O grande problema reside nas PCIs, placas presentes na maioria dos eletrônicos, principalmente computadores. Elas são enviadas para fora do País, já que o Brasil ainda não tem meios de reciclá-la.</p>
        </div>
          </div>
          <div class="carousel-item">
          <div class="card-body">
          <h5 class="card-title">CELULARES</h5>
          <p class="card-text"><span class="span_texto">O</span>s celulares, bem como suas baterias, normalmente podem ser devolvidos à empresa de telefonia celular. Se não estiverem quebrados, mas apenas ultrapassados, é possível doá-los para centros sociais que trabalham com inclusão digital. Lembre-se sempre que a reutilização também é uma excelente forma de descarte correto!</p>
        </div>
          </div>
          <div class="carousel-item">
          <div class="card-body">
          <h5 class="card-title">PILHAS E BATERIAS</h5>
          <p class="card-text"><span class="span_texto">S</span>ão extremamente comuns no dia a dia, e muita gente não sabe o que fazer com elas. O ideal é que esses itens sejam devolvidos às lojas ou fabricantes, que os encaminharão para um local que realiza a reciclagem do lixo eletrônico. Se o fabricante não oferecer essa opção, você pode procurar por alguma cooperativa local que faça o mesmo processo.</p>
        </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>
</div>
@endsection
