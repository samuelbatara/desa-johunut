<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
  private JsonController $jsonController;

  public function __construct(JsonController $jsonController) {
    $this->jsonController = $jsonController;
  }

  private function getPath() {
    return resource_path('data/potensi_desa.json');
  }

  public function getPotensiDesaByCode($code) {
    $daftar_potensi_desa = $this->jsonController->getContent(
      $this->getPath()
    );

    foreach ($daftar_potensi_desa as $potensi_desa) {
      if ($potensi_desa->code == $code) {
        return $potensi_desa;
      }
    }

    return null;
  }

}
