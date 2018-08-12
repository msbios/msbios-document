<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\DataType\Form\Element\DataTypeExtensionElement;
use Kubnete\Development\Controller\DataTypeController;
use Kubnete\Development\Form\DataTypeForm;
use Kubnete\Resource\Table\DataTypeTable;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeControllerFactory
 * @package Kubnete\Development\Factory
 */
class DataTypeControllerFactory implements FactoryInterface
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
     * @return DataTypeController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        // var_dump($container->get('FormElementManager')
        //     ->get(DataTypeElement::class)); die();

        return new DataTypeController(
            $container->get(DataTypeTable::class),
            $container->get('FormElementManager')
                ->get(DataTypeForm::class)
        );
    }
}
