<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase

{
  public function content()
  {
    return [
      '#markup' => 'Hello World!'
    ];
  }
}


