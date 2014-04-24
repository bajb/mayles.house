<?php
namespace BajbNet\MaylesHouse;

use Cubex\Http\Response;
use Cubex\Kernel\ControllerKernel;

/**
 * This project is the default entry point for you application, as specified
 * by conf/defaults.ini [kernel]default=
 */
class Project extends ControllerKernel
{
  /**
   * Default action will be executed if no alternate route can be found
   *
   * @return Response|null
   */
  public function defaultAction()
  {
    return new Response("Welcome to Mayles House");
  }
}
