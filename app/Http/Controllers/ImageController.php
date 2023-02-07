<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
  private JsonController $jsonController;

  public function __construct(JsonController $jsonController) {
    $this->jsonController = $jsonController;
  }

  public function getAssets($path) {
    $content = $this->jsonController->getContent($path);
    
    for ($i = 0; $i < count($content); $i += 1) {
      $content[$i]->path = asset($content[$i]->path);
    }

    return $content;
  }

  public function getMainAsset($path) {
    $content = $this->jsonController->getContent($path);

    foreach ($content as $asset) {
      if ($asset->main) {
        return asset($asset->path);
      }
    }

    return null;
  }
}
