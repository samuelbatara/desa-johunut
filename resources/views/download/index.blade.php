@extends('layouts.template')

@section('content')
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row">
  @foreach($daftar_download as $download)
  <div class="col-8">
    <div class="card mb-3" style="max-width: 100%;">
      <div class="row g-0">
        <div class="col">
          <div class="card-body">
            <a href="/download/{{ $download->code }}" style="text-decoration: none; color: black;">
            <h5 class="card-title">{{ $download->nama }}</h5>
            <p class="card-text">{{ $download->ringkasan }}</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection 
