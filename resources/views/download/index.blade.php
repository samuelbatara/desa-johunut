@extends('layouts.template')

@section('content')
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row">
  @foreach($daftar_download as $download)
  <div class="col-6">
    <div class="card mb-3" style="max-width: 100%;">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <a href="/download/{{ $download->code }}" style="text-decoration: none; color: black;">
            <h5 class="card-title">{{ $download->nama }}</h5>
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
