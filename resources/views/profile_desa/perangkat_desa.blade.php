@extends('layouts.template')

@section('content') 
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row mt-3">
  @foreach($perangkat_desa as $perangkat)
  <div class="col-4 mb-3">
    <div class="card" style="width: 18rem;">
      <img src="{{ $perangkat->image }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $perangkat->nama }}</h5>
        <p class="card-text">{{ $perangkat->jabatan }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
