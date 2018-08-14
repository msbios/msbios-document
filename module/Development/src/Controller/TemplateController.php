<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Controller;

use Kubnete\CPanel\Mvc\Controller\AbstractActionController;
use Kubnete\Resource\Record\Template;

/**
 * Class TemplateController
 * @package Kubnete\Development\Controller
 */
class TemplateController extends AbstractActionController
{
    /**
     * @return Template
     */
    protected static function factory()
    {
        return new Template;
    }
}
