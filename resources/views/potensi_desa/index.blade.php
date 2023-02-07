@extends('layouts.template')

@section('content')
  <h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

  <div class="row">
    @foreach($daftar_potensi_desa as $potensi_desa) 
    <div class="col-6">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ $image_src }}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <a href="/potensi-desa/{{ $potensi_desa->code }}" style="text-decoration: none; color: black;">
                <h5 class="card-title">{{ $potensi_desa->nama }}</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection 
