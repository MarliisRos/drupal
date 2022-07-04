<?php

namespace Drupal\hello_world\Controller;

use Drupal\core\Controller\ControllerBase;

class HelloController extends ControllerBase

{
  public function content()
  {
    return [
      '#markup' => 'Hello World!'
    ];
  }
}


