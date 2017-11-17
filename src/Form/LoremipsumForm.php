<?php

namespace Drupal\loremipsum\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\options\Plugin\Field\FieldType;
use Drupal\options\Plugin\Field\FieldType\ListStringItem;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
 
/**
 * Class questionboxApplySettings.
 *
 * @package Drupal\loremipsum\Form
 */
class LoremipsumForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'loremipsum.api_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'loremipsum_api_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('loremipsum.api_settings');
    
    $form['loremipsum_form_fieldset'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Loremipsum Configuration settings'),
      '#prefix' => "<div id='loremipsum-form-fieldset-wrapper'>",
      '#suffix' => '</div>',
    ];

    
    
    $form['loremipsum_form_fieldset']['api_key'] = [
        '#type' => 'textfield',
        '#title' => $this->t('NAME'),
        '#description' => $this->t('Add your name here.'),
        '#default_value' => $config->get('loremipsum_name_key'),
        '#required' => TRUE,
      ];

    $form['loremipsum_form_fieldset']['site_id'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Site Name'),
        '#description' => $this->t('Add your Site Name here.'),
        '#default_value' => $config->get('loremipsum_site_name'),
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
        // Retrieve the configuration
    $this->config('loremipsum.api_settings')
      // Set the submitted configuration setting
      ->set('loremipsum_name_key', $form_state->getValue('api_key'))
      // You can set multiple configurations at once by making
      // multiple calls to set()
      ->set('loremipsum_site_name', $form_state->getValue('site_id'))
      ->save();

    parent::submitForm($form, $form_state);

  }

}
