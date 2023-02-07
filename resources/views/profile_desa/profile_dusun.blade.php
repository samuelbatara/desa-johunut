@extends('layouts.template')

@section('content')

<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row">
  @foreach($dusuns as $dusun)
  <div class="col-4 mb-3">
    <div class="card" style="width: 18rem;">
      <img src="{{ $image_src }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $dusun->nama }}</h5>
        <p class="card-text">{{ $dusun->summary }}</p>
        <a href="/profile-dusun/{{ $dusun->code }}" class="btn btn-secondary">Detail</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
