<?php

namespace Drupal\helloworld\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;



 /**
 * Provides a Lorem ipsum block with which you can generate dummy text anywhere
 *
 * @Block(
 *   id = "helloworld_block",
 *   admin_label = @Translation("Hello world block"),
 *   category = @Translation("Forms")
 * )
 */
class HelloworldBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Return the form @ Form/helloworldBlockForm.php
    return \Drupal::formBuilder()->getForm('Drupal\helloworld\Form\HelloworldBlockForm');
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'generate lorem ipsum');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue(
      'helloworld_block_settings',
      $form_state->getValue('helloworld_block_settings')
    );
  }

}
