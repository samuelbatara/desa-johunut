@extends('layouts.template')

@section('content')
  <h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

  <div class="row">
    @foreach($daftar_informasi as $informasi)
    <div class="col-6">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ $image_src }}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
            <a href="/informasi/{{ $informasi->code }}" style="text-decoration: none; color: black;">
                <h5 class="card-title">{{ $informasi->nama }}</h5>
                <p class="card-text">{{ $informasi->ringkasan }}</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection