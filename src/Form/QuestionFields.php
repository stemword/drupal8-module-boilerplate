<?php

namespace Drupal\loremipsum\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class questionboxApplySettings.
 *
 * @package Drupal\loremipsum\Form
 */
class QuestionFields extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'loremipsum.customfield_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'question_field_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('loremipsum.customfield_settings');
      
      $form['loremipsum_form_fieldset'] = [
        '#type' => 'fieldset',
        '#title' => $this->t('Loremipsum Custom settings'),
        '#prefix' => "<div id='loremipsum-form-fieldset-wrapper'>",
        '#suffix' => '</div>',
      ];

      
      
      $form['loremipsum_form_fieldset']['key'] = [
          '#type' => 'textfield',
          '#title' => $this->t('NAME'),
          '#description' => $this->t('Add your name here.'),
          '#default_value' => $config->get('loremipsum_name_key'),
          '#required' => TRUE,
        ];

      $form['loremipsum_form_fieldset']['id'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Site Name'),
          '#description' => $this->t('Add your Site Name here.'),
          '#default_value' => $config->get('loremipsum_site_id'),
          '#required' => TRUE,
        ];


    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('loremipsum.customfield_settings')
      // Set the submitted configuration setting
      ->set('loremipsum_name_key', $form_state->getValue('key'))
      // You can set multiple configurations at once by making
      // multiple calls to set()
      ->set('loremipsum_site_id', $form_state->getValue('id'))
      ->save();

    parent::submitForm($form, $form_state);
  }

  
}
