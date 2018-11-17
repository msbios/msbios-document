<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Development\Controller;

use MSBios\Document\CPanel\Mvc\Controller\AbstractActionController;
use MSBios\Document\Resource\Record\DataType;

/**
 * Class DataTypeController
 * @package MSBios\Document\Development\Controller
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
