@extends('layouts.template')

@section('content')
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row mt-3">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <img src="{{ $image_src }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="{{ $image_src }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="{{ $image_src }}" class="d-block W-100" alt="...">
      </div>
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

@endsection 
