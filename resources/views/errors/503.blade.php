<!DOCTYPE html>
@extends('errors.app')
<title>Erro 503</title>
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container py-lg-5 py-md-3">
        <h2>Erro 503</h2>
        <p>Serviço Indisponível.</p>
      </div>
    </div>
  </section>

  <!-- Erro 503 -->
  <section class="w3l-features-photo-7 py-5">
    <div class="w3l-features-photo-7_sur py-lg-5 py-sm-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 sobre-p m-auto text-center">
            <h2 class="fw-bold">Erro 503!</h2>
            <p>O servidor que está em manutenção ou sobrecarregado.</p>
          </div>
        </div>
        <div class="row py-5">
          <div class="col-lg-12 text-center">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-style">Voltar para o Website <span class="fa fa-angle-double-right fw-bold ml-2"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection