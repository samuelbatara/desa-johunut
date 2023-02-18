<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JsonException;

class ContentController extends Controller
{

  private JsonController $jsonController;
  private DusunController $dusunController;
  private PotensiDesaController $potensiDesaController;
  private ImageController $imageController;
  private InformasiController $informasiController;
  private DataPendudukController $dataPendudukController;

  private $default_page_title = "Desa Johunut";
  private $asset_balai_desa = "data/gambar_balai_desa.json";

  public function __construct(JsonController $jsonController,
                              DusunController $dusunController,
                              PotensiDesaController $potensiDesaController,
                              ImageController $imageController,
                              InformasiController $informasiController,
                              DataPendudukController $dataPendudukController) {
    $this->jsonController = $jsonController;
    $this->dusunController = $dusunController;
    $this->potensiDesaController = $potensiDesaController;
    $this->imageController = $imageController;
    $this->informasiController = $informasiController;
    $this->dataPendudukController = $dataPendudukController;
  }

  public function index() {
    $card_title = "Desa Johunut";
    $images = $this->imageController->getAssets(
      resource_path($this->asset_balai_desa)
    );
    $data_penduduk = $this->dataPendudukController->getDataPendudukByCode(
      'desa_johunut'
    );

    return view('index', [
      'page_title' => $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
      'images' => $images,
      'data_penduduk' => $data_penduduk
    ]);
  }

  public function getVisionAndMisionContent() {
    $card_title = "Visi dan Misi";

    return view('profile_desa/visi_dan_misi', [
      'page_title' => "Visi dan Misi - " . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png')
    ]);
  }

  public function getPerangkatDesaContent() {
    $card_title = "Perangkat Desa";
    $perangkat_desa = $this->jsonController->getContent(
      resource_path('data/perangkat_desa.json')
    );

    return view('profile_desa/perangkat_desa', [
      'page_title' => 'Perangkat Desa - ' . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
      'perangkat_desa' => $perangkat_desa
    ]);
  }

  public function getProfileDusunContent() {
    $card_title = "Profile Dusun";
    $dusuns = $this->jsonController->getContent(
      resource_path('data/profile_dusun.json'));

    return view('profile_desa/profile_dusun', [
      'page_title' => 'Profile Dusun - ' . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
      'dusuns' => $dusuns
    ]);
  }

  public function getProfileDusunContentByCode($code) {
    $dusun = $this->dusunController->getDusunByCode($code);
    $card_title = $dusun->nama;
    $data_penduduk = $this->dataPendudukController->getDataPendudukByCode($code);

    return view('profile_desa/detail_dusun', [
      'page_title' => "Dusun " . $dusun->nama . ' - ' . $this->default_page_title,
      'card_title' => "Dusun " . $card_title,
      'image_src' => asset('assets/loading.png'),
      'dusun' => $dusun,
      'data_penduduk' => $data_penduduk
    ]);
  }

  public function getPetaDesaContent() {
    $card_title = "Peta Desa";
    $peta_desa = $this->jsonController->getContent(
      resource_path('data/peta_desa.json')
    );

    return view('profile_desa/peta_desa', [
      'page_title' => "Peta Desa - " . $this->default_page_title,
      'card_title' => $card_title,
      'peta_desa' => $peta_desa
    ]);
  }

  public function getPotensiDesaContent() {
    $card_title = "Potensi Desa";
    $daftar_potensi_desa = $this->jsonController->getContent(
      resource_path('data/potensi_desa.json')
    );

    return view('potensi_desa/index', [
      'page_title' => "Potensi Desa - " . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
      'daftar_potensi_desa' => $daftar_potensi_desa
    ]);
  }

  public function getPotensiDesaContentByCode($code) {
    $potensi_desa = $this->potensiDesaController->getPotensiDesaByCode($code);
    $card_title = $potensi_desa->nama;

    return view('potensi_desa/detail_potensi', [
      'page_title' => $potensi_desa->nama . ' - ' . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
      'potensi_desa' => $potensi_desa
    ]);
  }

  public function getInformasiContent() {
    $card_title = "Informasi";
    $daftar_informasi = $this->jsonController->getContent(
      resource_path('data/daftar_informasi.json')
    );

    return view('informasi/index', [
      'page_title' => "Informasi - " . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
      'daftar_informasi' => $daftar_informasi
    ]);
  }

  public function getInformasiContentByCode($code) {
    $informasi = $this->informasiController->getInformasiByCode($code);

    return view('informasi/detail_informasi', [
      'page_title' => $informasi->nama . ' - '. $this->default_page_title,
      'card_title' => $informasi->nama,
      'image_src' => asset('assets/loading.png'),
      'informasi' => $informasi
    ]);
  }

  public function getDownloadContent() {
    $card_title = "Download Center";
    $daftar_download = $this->jsonController->getContent(
      resource_path('data/daftar_download.json')
    );

    return view('download/index', [
      'page_title' => "Download - " . $this->default_page_title,
      "card_title" => $card_title,
      "image_src" => asset('assets/loading.png'),
      'daftar_download' => $daftar_download
    ]);
  }
}
