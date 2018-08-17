<?php

namespace Drupal\loremipsum\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'LoremipsumdataBlock' block.
 *
 * @Block(
 *  id = "loremipsumdata_block",
 *  admin_label = @Translation("LoremipsumdataBlock block"),
 * )
 */
class LoremipsumdataBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    ////$build = [];
    //$build['mydata_block']['#markup'] = 'Implement LoremipsumdataBlock.';

    $form = \Drupal::formBuilder()->getForm('Drupal\loremipsum\Form\LoremipsumDataForm');

    return $form;
  }

}
