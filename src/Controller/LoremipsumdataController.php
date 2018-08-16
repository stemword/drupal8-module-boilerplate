<?php

namespace Drupal\loremipsum\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class LoremipsumdataController.
 *
 * @package Drupal\loremipsum\Controller
 */
class LoremipsumdataController extends ControllerBase {

  /**
   * Display.
   *
   * @return string
   *   Return Hello string.
   */
  public function display() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This page contain all inforamtion about my data ')
    ];
  }

}
