<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 23.01.17
 * Time: 11:16
 */

namespace Kubnete\DataType\Form\Element;

use Zend\Config\Config;
use Zend\Form\Element\Select;

/**
 * Class DataTypeExtensionElement
 * @package Kubnete\DataType\Form\Element
 */
class DataTypeExtensionElement extends Select
{
    /**
     * DataTypeElement constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        foreach ($config->get('data-types') as $item) {
            $this->valueOptions[$item['service']] = $item['description'];
        }
    }
}
