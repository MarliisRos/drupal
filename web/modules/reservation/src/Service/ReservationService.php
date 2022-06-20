<?php

class ReservationService
{ const SERVICE_ID = 'reservation.reservation_service';
  const AVAILABLE_TIMES = [
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
  public function availTimes(): array {
    $returnData = [];
    $nodeStorage = \Drupal::entityTypeManager()->getStorage('node');
    $reservationIds = $nodeStorage->getQuery()
      ->condition('type', 'reservation')
      ->condition('field_start_date', '2022-06-20T00:00:00', '>')
      ->condition('field_start_date', '2022-06-20T23:59:59', '<')
      ->condition('field_confirmed', 1)
      ->execute();
    $availTimes = self::AVAILABLE_TIMES;
    foreach ($reservationIds as $reservationId) {
      /*** @var \Drupal\node\NodeInterface $reservation */
      $reservation = $nodeStorage->load($reservationId);
      $reservationHour = (new \DateTime($reservation->field_start_date->value))->format('G');
      unset($availTimes[$reservationHour]);
    }
    return $availTimes;
  }
}
