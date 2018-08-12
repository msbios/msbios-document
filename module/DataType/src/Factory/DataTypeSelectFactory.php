<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 23.01.17
 * Time: 11:19
 */

namespace Kubnete\DataType\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\DataType\Form\Element\DataTypeExtensionElement;
use Kubnete\DataType\Module;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeSelectFactory
 * @package Kubnete\DataType\Factory
 */
class DataTypeSelectFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     * @return DataTypeExtensionElement
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DataTypeExtensionElement(
            $container->get(Module::class)
        );
    }
}
