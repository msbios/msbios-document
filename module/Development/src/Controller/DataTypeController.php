<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Controller;

use Kubnete\CPanel\Mvc\Controller\AbstractActionController;
use Kubnete\Resource\Record\DataType;

/**
 * Class DataTypeController
 * @package Kubnete\Development\Controller
 */
class DataTypeController extends AbstractActionController
{
    /**
     * @return DataType
     */
    protected static function factory()
    {
        return new DataType;
    }
}
