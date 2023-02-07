<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{

  public function getContent($path) {
    $content = file_get_contents($path);
    $content_decoded = json_decode($content);

    return $content_decoded;
  }
}
