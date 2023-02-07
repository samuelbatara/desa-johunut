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

  private $default_page_title = "Desa Johunut";

  public function __construct(JsonController $jsonController,
                              DusunController $dusunController,
                              PotensiDesaController $potensiDesaController) {
    $this->jsonController = $jsonController;
    $this->dusunController = $dusunController;
    $this->potensiDesaController = $potensiDesaController;
  }

  public function index() {
    $card_title = "Selamat Datang";

    return view('index', [
      'page_title' => $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png'),
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

    return view('profile_desa/perangkat_desa', [
      'page_title' => 'Perangkat Desa - ' . $this->default_page_title,
      'card_title' => $card_title,
      'image_src' => asset('assets/loading.png')
    ]);
  }

  public function getProfileDusunContent() {
    $card_title = "Profile Dusun";
    $dusuns = $this->jsonController->getContent(
      resource_path('data\\profile_dusun.json'));

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

    return view('profile_desa/detail_dusun', [
      'page_title' => "Dusun " . $dusun->nama . ' - ' . $this->default_page_title,
      'card_title' => "Dusun " . $card_title,
      'image_src' => asset('assets/loading.png'),
      'dusun' => $dusun
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
