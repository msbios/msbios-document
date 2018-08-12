<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Development\Controller\DataTypeController;
use Kubnete\Development\Form\TypeTab\PropertyFieldset;
use Kubnete\Development\Form\TypeTabFieldset;
use Kubnete\Resource\Form\Element\DataTypeElement;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TypeTabFieldsetFactory
 * @package Kubnete\Development\Factory
 */
class TypeTabFieldsetFactory implements FactoryInterface
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
     * @return TypeTabFieldset
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new TypeTabFieldset(
            $container->get('FormElementManager')
                ->get(PropertyFieldset::class)
        );
    }
}
