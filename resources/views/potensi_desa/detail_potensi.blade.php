@extends('layouts.template')

@section('content')
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row mt-3">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($potensi_desa->images as $image)
      <div class="carousel-item @if ($image->main) active @endif" data-bs-interval="5000">
        <img src="{{ $image->path }}" class="d-block w-100" alt="...">
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="row mt-3">
  <div class="card">
    <div class="card-body">
      @foreach ($potensi_desa->detail as $text) 
      <p class="card-text">{{ $text->value }}</p>
      @endforeach
    </div>
  </div>
</div>
@endsection
