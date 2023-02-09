<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPendudukController extends Controller
{
  private JsonController $jsonController;

  public function __construct(JsonController $jsonController) {
    $this->jsonController = $jsonController;
  }

  private function getPath() {
    return resource_path('data/data_penduduk.json');
  }

  public function getDataPendudukByCode($code) {
    $data_penduduk = $this->jsonController->getContent(
      $this->getPath()
    );

    foreach ($data_penduduk as $penduduk) {
      if ($penduduk->code == $code) {
        return $penduduk;
      }
    }

    return null;
  }
}
