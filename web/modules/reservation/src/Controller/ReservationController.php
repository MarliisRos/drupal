<?php

namespace Drupal\reservation\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\reservation\Service\ReservationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
* Returns responses for Reservation routes.
 */
class ReservationController extends ControllerBase {

//  private ?Request $request;
//
//  private $reservationStorage;

//  public function showAvailableTimes() {
//        echo ('Hello World ');
//        return [
//          '#type' => 'view',
//          '#name' => 'content',
//          '#display_id' => 'page_1',
//        ];

  /**
   * @throws \Drupal\Component\Plugin\Exception\
   * @throws \Drupal\Component\Plugin\Exception\
   */
  public function showAvailableTimes()
  {
    /*** @var ReservationService $reservationService */
    $reservationService = \Drupal::service(ReservationService::SERVICE_ID);
    $times = $reservationService->timesAvail();
    return [
      '#theme' => 'reservation_list',
      '#items' => $times,
      '#attached' => ['library' => ['reservation/reservation']]
    ];
  }

    public function reservationForm() {
      $form = \Drupal::formBuilder()
        ->getForm('Drupal\reservation\Form\ReservationForm');
      return [
        'form' => $form,
      ];
    }


  public function content() {
    return [ '#markup' => 'Reserveeringud!'
    ];
  }


}

//public function showAvailableTimes(): JsonResponse
//{
//  /*** @var ReservationService $reservationService */
//  $reservationService = \Drupal::service(\ReservationService::SERVICE_ID);
//  return new JsonResponse([
//    'data' => $reservationService->availTimes(),
//    'method' => 'GET',
//    'status' => 200,
//  ]);
//}
