<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
  private JsonController $jsonController;

  public function __construct(JsonController $jsonController) {
    $this->jsonController = $jsonController;
  }

  private function getPath() {
    return resource_path('data/daftar_informasi.json');
  }

  public function getInformasiByCode($code) {
    $daftar_informasi = $this->jsonController->getContent(
      $this->getPath()
    );

    foreach ($daftar_informasi as $informasi) {
      if ($informasi->code == $code) {
        return $informasi;
      }
    }

    return null;
  }
}
