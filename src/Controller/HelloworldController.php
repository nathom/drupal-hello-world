<?php

/**
 * @file
 * Contains \Drupal\helloworld\Controller\helloworldController
 */

namespace Drupal\helloworld\Controller;

use Drupal\Component\Utility\Html;
use Drupal\helloworld\Service\HelloworldService;

class HelloworldController {
  protected $element = [];

  public function generate() {
    $helloworldService = \Drupal::service('helloworld.helloworld_service');
    $element = $helloworldService->generate();
    return $element;
  }

}
