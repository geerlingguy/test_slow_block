<?php

/**
 * Provides a 'Test Slow Block'.
 *
 * @Block(
 *   id = "test_slow_block",
 *   admin_label = @Translation("Test Slow Block"),
 * )
 */

namespace Drupal\test_slow_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

class TestSlowBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    // Add a sleep so we can verify BigPipe is working and the request is being
    // streamed through the entire stack.
    sleep(5);

    $build = [
      '#markup' => $this->t('This block takes a while to generate.'),
      '#cache' => [
        // Setting max-age to 0 effectively disables caching for this block.
        // BigPipe will auto placeholder the block because of this.
        'max-age' => 0,
      ],
    ];

    return $build;
  }
}
