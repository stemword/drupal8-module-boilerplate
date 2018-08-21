<?php

namespace Drupal\loremipsum\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Class loremipsumForm.
 *
 * @package Drupal\loremipsum\Form
 */
class AjaxExampleForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_example_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['user_email'] = array(
      '#type' => 'textfield',
      '#title' => 'User or Email',
      '#description' => 'Please enter in a user or email',
      '#prefix' => '<div id="user-email-result"></div>',
       );
  	$form['actions'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit1'),
      '#ajax' => array(
         'callback' => '::checkUserEmailValidation',
          'progress' => array(
             'type' => 'throbber',
             'message' => NULL,
          ),
      )
    ];
    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {

        
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    
     }


  public function checkUserEmailValidation(array $form, FormStateInterface $form_state) {
   $ajax_response = new AjaxResponse();
  // Check if User or email exists or not
   if (user_load_by_name($form_state->getValue(user_email)) || user_load_by_mail($form_state->getValue(user_email))) {
     $text = 'User or Email is exists';
   } else {
     $text = 'User or Email does not exists';
   }
   $ajax_response->addCommand(new HtmlCommand('#user-email-result', $text));
   return $ajax_response;
   }


}
