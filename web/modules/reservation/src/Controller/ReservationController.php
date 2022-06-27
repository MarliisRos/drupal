<?php

namespace Drupal\reservation\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\reservation\Service\ReservationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Returns responses for Reservation routes.
 */
class ReservationController extends ControllerBase
{
  private ?Request $request;
  private $reservationStorage;

  public function showAvailableTimes()
  {
    /*** @var ReservationService $reservationService */
    $reservationService = \Drupal::service(\ReservationService::SERVICE_ID);
    return new JsonResponse(['data' => $reservationService->availTimes(), 'method' => 'GET', 'status' => 200]);
  }

  public function content()
  {
    return [
      '#markup' => 'Reserveeringud!'
    ];
  }
}
