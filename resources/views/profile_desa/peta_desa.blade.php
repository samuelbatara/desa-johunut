@extends('layouts.template')

@section('content')

<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

@foreach ($peta_desa as $peta) 
<div class="row mb-3">
  <label for="nama" style="font-weight: bold;">{{ $peta->nama }}</label>
  <img src="{{ $peta->path }}" alt="$peta_path">
</div>
@endforeach

@endsection