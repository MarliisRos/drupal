<?php

namespace Drupal\reservation\Service;

use Drupal\Core\Datetime\DateTime;
use Drupal\Core\Datetime\DrupalDateTime;

class ReservationService
{
  public const SERVICE_ID = 'reservation.reservation_service';

  public const AVAILABLE_TIMES = [
    8 => true,
    9 => true,
    10 => true,
    11 => true,
    12 => true,
    13 => true,
    14 => true,
    15 => true,
    16 => true,
    17 => true,
    18 => true,
    19 => true,
    20 => true,
    21 => true,
  ];
  /**
   * @return array
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */

  public function timesAvail(): array {
    $timesAvail = $this->availTimes();
    foreach ($timesAvail as $key => $value) {
      if($value) {
        $result = 'TRUE';
      }
      else {
        $result = 'FALSE';
      }
      $times[$key] = ['time' => $key, 'available' => $result];
    }
    return $times;
  }

  public function availTimes(): array {
    $nodeStorage = \Drupal::entityTypeManager()->getStorage('node');
    $reservationIds = $nodeStorage->getQuery()
      ->condition('type', 'reservation_apike')
      ->condition('field_start_date', date('Y-m-d').'T00:00', '>')
      ->condition('field_start_date', date('Y-m-d').'T23:59', '<')
      ->condition('field_confirm', 1)
      ->execute();
    $availTimes = self::AVAILABLE_TIMES;

    foreach ($reservationIds as $reservationId) {
      /*** @var \Drupal\node\NodeInterface $reservation */
      $reservation = $nodeStorage->load($reservationId);

      $date_original = new DrupalDateTime($reservation->file_start_date->value,'UTC');
      $dateTime = \Drupal::service('date.formatter')
        ->format($date_original->getTimestamp(), 'custom','Y-m-d H:i:s');
      $reservationHour = (new \DateTime($dateTime))->format('G');
//      $availTimes[$reservationHour];
      $availTimes[$reservationHour] =FALSE;
    }
//   var_dump($availTimes);die;
    return $availTimes;
  }
}
