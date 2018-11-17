<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\CPanel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package MSBios\Document\CPanel\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return parent::indexAction();
    }

    /**
     * @return ViewModel
     */
    public function changelogAction()
    {
        return new ViewModel;
    }
}
