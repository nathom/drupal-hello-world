<?php

/**
 * @file
 * Contains \Drupal\helloworld\Form\BlockFormController
 */

namespace Drupal\helloworld\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class HelloworldBlockForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'helloworld_block_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    // How many paragraphs?
    for ($i = 1; $i <= 10; $i++) $options[$i] = $i;

    // Submit
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Say Hello!'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // $phrases = $form_state->getValue('phrases');
    // // The value cannot be empty.
    // if (is_null($phrases)) $form_state->setErrorByName('phrases', t('This field cannot be empty.'));
    // // The value must be numeric.
    // if (!is_numeric($phrases)) {
    //   $form_state->setErrorByName('phrases', t('Please use a number.'));
    // }
    // else {
    //   // A numeric value must still be an integer.
    //   if (floor($phrases) != $phrases) $form_state->setErrorByName('phrases', t('No decimals, please.'));
    //   // A numeric value cannot be zero or negative.
    //   if ($phrases < 1) $form_state->setErrorByName('phrases', t('Please use a number greater than zero.'));
    // }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect(
      'helloworld.generate',
      array(
        // 'paragraphs' => $form_state->getValue('paragraphs'),
        // 'phrases' => $form_state->getValue('phrases'),
      )
    );
  }
}
