<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Development\Controller\DocumentTypeController;
use Kubnete\Development\Form\DocumentTypeForm;
use Kubnete\Resource\Table\DocumentTypeTableGateway;
use Kubnete\Resource\Table\PropertyTable;
use Kubnete\Resource\Table\TabTable;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTypeControllerFactory
 * @package Kubnete\Development\Factory
 */
class DocumentTypeControllerFactory implements FactoryInterface
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
     * @return DocumentTypeController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentTypeController(
            $container->get(DocumentTypeTableGateway::class),
            $container->get(TabTable::class),
            $container->get(PropertyTable::class),
            $container->get('FormElementManager')
                ->get(DocumentTypeForm::class)
        );
    }
}
