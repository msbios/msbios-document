<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\DataType\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\DataType\Form\Element\Select;
use Kubnete\DataType\Module;
use Zend\Form\ElementInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SelectFactory
 * @package Kubnete\DataType\Factory
 */
class SelectFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Select|ElementInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var array $options */
        $options = $container->get(Module::class);

        /** @var ElementInterface $instance */
        $instance = new Select;

        /** @var array $valueOptions */
        $valueOptions = [];

        /** @var array $datatypeInfo */
        foreach ($options as $datatypeInfo) {
            $valueOptions[$datatypeInfo['factory']] = $datatypeInfo['name'];
        }

        $instance->setValueOptions($valueOptions);

        return $instance;
    }
}
