<?php
/**
 * @file
 * Contains \Drupal\reservation\Form\ReservationForm.
 */

namespace Drupal\reservation\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ReservationForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'reservation_form';
    // TODO: Implement getFormId() method.
  }

  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state) {
    // TODO: Implement buildForm() method.
    $form['contact_name'] = [
      '#type' => 'textfield',
      '#title' => t('Contact Name'),
      '#required' => TRUE,
    ];
    $form['contact_email'] = [
      '#type' => 'textfield',
      '#title' => t('Contact email'),
      '#required' => TRUE,
    ];
    $form['start_date'] = [
      '#type' => 'date',
      '#title' => t('Reservation time'),
      '#required' => TRUE,
    ];

    $form['contact_name_copy'] = [
      '#type' => 'checkbox',
    '#title' => t('Send me confirmation '),
    ];

    $form['confirm'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
      // TODO: Implement submitForm() method.
//    reservation_set_message($form_state->getValues('Your reservation has been created'));
  }

}
