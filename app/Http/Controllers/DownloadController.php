<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
  private JsonController $jsonController;

  public function __construct(JsonController $jsonController) {
    $this->jsonController = $jsonController;
  }

  private function getPath() {
    return resource_path('data/daftar_download.json');
  }

  public function getDownloadByCode($code) {
    $daftar_download = $this->jsonController->getContent(
      $this->getPath()
    );

    foreach ($daftar_download as $download) {
      if ($download->code == $code) {
        return response()->download($download->path);
      }
    }

    return back();
  } 
}