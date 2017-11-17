<?php
/**
 * @file
 * Contains \Drupal\loremipsum\Plugin\Block\HelloBlock.
 */

namespace Drupal\loremipsum\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'loremipsum' Block
 *
 * @Block(
 *   id = "loremipsum_block",
 *   admin_label = @Translation("loremipsum block"),
 * )
 */
class HelloBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('Hello, World!'),
    );
  }
}