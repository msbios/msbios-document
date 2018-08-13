<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\CPanel\Navigation\Service;

use Zend\Navigation\Service\DefaultNavigationFactory;

/**
 * Class ConfigurationNavigationFactory
 * @package Kubnete\Backend\Navigation\Service
 */
class ConfigurationNavigationFactory extends DefaultNavigationFactory
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'configuration';
    }
}
