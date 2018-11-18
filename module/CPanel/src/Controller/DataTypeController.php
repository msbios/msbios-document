<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\CPanel\Controller;

use MSBios\CPanel\Mvc\Controller\AbstractActionController;
use MSBios\Document\Resource\Record\DataType;

/**
 * Class DataTypeController
 * @package MSBios\Document\CPanel\Controller
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
