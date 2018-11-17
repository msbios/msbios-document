<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Terminal\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class TemplateController
 * @package MSBios\Document\Console\Controller
 */
class TemplateController extends AbstractActionController
{
    /**
     *
     */
    public function indexAction()
    {
        echo "-- Start Template Script\n";
        echo "-- Finish Template Script\n";
    }
}
