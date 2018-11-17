<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\CPanel\Navigation\Service;

use Zend\Navigation\Service\DefaultNavigationFactory;

/**
 * Class ConfigurationNavigationFactory
 * @package MSBios\Document\Backend\Navigation\Service
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
