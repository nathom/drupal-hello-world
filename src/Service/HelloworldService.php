<?php

namespace Drupal\helloworld\Service;

use Drupal\Component\Utility\Html;

class HelloworldService {

  public function generate() {
    // Default settings
    $config = \Drupal::config('helloworld.settings');
    // Page title and source text.
    $page_title = $config->get('helloworld.page_title');
    $source_text = $config->get('helloworld.source_text');

    // Repertory strategy.
    $repertory = explode(PHP_EOL, str_replace(array("\r\n", "\n\r", "\r", "\n"), PHP_EOL, $source_text));

    // $element['#source_text'] = 'Hello world!';
    $element['#source_text'] = array_fill(0, 1, 'Hello world!');
    $element['#title'] = Html::escape($page_title);

    // Theme function
    $element['#theme'] = 'helloworld';

    return $element;
  }

}
