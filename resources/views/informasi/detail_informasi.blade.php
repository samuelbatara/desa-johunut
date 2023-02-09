@extends('layouts.template')

@section('content')
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row mt-3">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($informasi->images as $image)
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
      @foreach ($informasi->contents as $content)
      @if ($content->tipe == "text")
      <p class="card-text">{{ $content->value }}</p>
      @else 
      <div class="row">
        <iframe src="https://www.youtube.com/embed/-CAZQ4_5E94" frameborder="0" height="500"></iframe>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</div>
@endsection
