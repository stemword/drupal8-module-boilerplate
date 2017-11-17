<?php
/**
 * @file
 * Contains \Drupal\loremipsum\Controller\LoremipsumController.
 */

namespace Drupal\loremipsum\Controller;

use Drupal\Core\Controller\ControllerBase;

class LoremipsumController extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello world to loremipsum'),
    );
  }
}