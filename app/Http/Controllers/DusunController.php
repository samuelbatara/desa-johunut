<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DusunController extends Controller
{
  private JsonController $jsonController;

  public function __construct(JsonController $jsonController) {
    $this->jsonController = $jsonController;
  }

  public function getDusunByCode($code) {
    $daftar_dusun = $this->jsonController->getContent(
      $this->getPath()
    );

    foreach ($daftar_dusun as $dusun) {
      if ($dusun->code == $code) {
        return $dusun;
      }
    }

    return null;
  }

  private function getPath() {
    return resource_path('data/profile_dusun.json');
  }
}
