<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\DataType\Form\Element\DataTypeExtensionElement;
use Kubnete\Development\Controller\TemplateController;
use Kubnete\Development\Form\DataTypeForm;
use Kubnete\Development\Form\TemplateForm;
use Kubnete\Resource\Table\TemplateTable;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeFormFactory
 * @package Kubnete\Development\Factory
 */
class DataTypeFormFactory implements FactoryInterface
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
     * @return TemplateController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DataTypeForm(
            $container->get('FormElementManager')
                ->get(DataTypeExtensionElement::class)
        );
    }
}
