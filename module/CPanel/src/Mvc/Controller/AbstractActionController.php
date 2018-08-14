<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\CPanel\Mvc\Controller;

use MSBios\CPanel\Mvc\Controller\AbstractActionController as DefaultAbstractActionController;

/**
 * Class AbstractActionController
 * @package Kubnete\CPanel\Mvc\Controller
 */
class AbstractActionController extends DefaultAbstractActionController
{
    /**
     * @return string
     */
    protected function getMatchedRouteName() {
        return $this
            ->getEvent()
            ->getRouteMatch()
            ->getMatchedRouteName();
    }
}