@extends('layouts.template')

@section('content')
<h4 class="card-title" style="font-weight: bold;">{{ $card_title }}</h4>

<div class="row mt-3">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($dusun->images as $image)
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
      <h5 class="card-title" style="font-weight: bold;">Data Penduduk</h5>
      <i class="card-text" style="font-size: medium;">Periode: {{ $data_penduduk->periode }}</i>
      <p class="card-text">Jumlah Rumah: {{ $data_penduduk->data->jumlah_rumah }}</p>
      <p class="card-text">Jumlah Kepala Keluarga: {{ $data_penduduk->data->jumlah_kk }}</p>
      <p class="card-text">Jumlah Kepala Keluarga Perempuan: {{ $data_penduduk->data->jumlah_kk_perempuan }}</p>

      <?php $berdasarkan_jenis_kelamin = $data_penduduk->data->jenis_kelamin; ?>
      <div class="row mt-4">
        <h5 class="card-title" style="font-weight: bold; font-size: medium;">{{ $berdasarkan_jenis_kelamin->desc }}</h5>
        <table style="border: 1px solid black; width: 70%;">
          <tr>
            <th>Nama</th>
            @foreach ($berdasarkan_jenis_kelamin->data as $data)
            <td>{{ $data->key }}</td>
            @endforeach
          </tr>
          <tr>
            <th>Jumlah</th>
            @foreach ($berdasarkan_jenis_kelamin->data as $data)
            <td>{{ $data->value }}</td>
            @endforeach
          </tr>
        </table>
      </div>

      <?php $berdasarkan_pendidikan = $data_penduduk->data->pendidikan; ?>
      <div class="row mt-4">
        <h5 class="card-title" style="font-weight: bold; font-size: medium;">{{ $berdasarkan_pendidikan->desc }}</h5>
        <table style="border: 1px solid black; width: 70%;">
          <tr>
            <th>Nama</th>
            @foreach ($berdasarkan_pendidikan->data as $data)
            <td>{{ $data->key }}</td>
            @endforeach
          </tr>
          <tr>
            <th>Jumlah</th>
            @foreach ($berdasarkan_pendidikan->data as $data)
            <td>{{ $data->value }}</td>
            @endforeach
          </tr>
        </table>
      </div>

      <?php $berdasarkan_pekerjaan = $data_penduduk->data->pekerjaan; ?>
      <div class="row mt-4">
        <h5 class="card-title" style="font-weight: bold; font-size: medium;">{{ $berdasarkan_pekerjaan->desc }}</h5>
        <table style="border: 1px solid black; width: 70%;">
          <tr>
            <th>Nama</th>
            @foreach ($berdasarkan_pekerjaan->data as $data)
            <td>{{ $data->key }}</td>
            @endforeach
          </tr>
          <tr>
            <th>Jumlah</th>
            @foreach ($berdasarkan_pekerjaan->data as $data)
            <td>{{ $data->value }}</td>
            @endforeach
          </tr>
        </table>
      </div>
      
    </div>
  </div>
</div>

@endsection 
