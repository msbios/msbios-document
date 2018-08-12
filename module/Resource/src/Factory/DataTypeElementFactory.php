<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Resource\Form\Element\DataTypeElement;
use Kubnete\Resource\Table\DataTypeTable;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeElementFactory
 * @package Kubnete\Resource\Factory
 */
class DataTypeElementFactory implements FactoryInterface
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
     * @return DataTypeElement
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DataTypeElement(
            $container->get(DataTypeTable::class)
        );
    }
}
