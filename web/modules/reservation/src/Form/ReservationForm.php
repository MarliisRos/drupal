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
    $reservationService = \Drupal::service(ReservationService::SERVICE_ID);
    $times = $reservationService->AvailTimes();

    foreach ($times as $time => $bool) {
      if (!$bool) {
        unset($times[$time]);
      }
      else {
        $formattedTime = mktime($time, 00, 00);
        $formattedTime = date('Y-m-d H:i:s', $formattedTime);
        $formattedTimes[$formattedTime] = $formattedTime;
      }
    }

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

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] =[
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


