<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Content\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Content\Controller\DocumentController;
use Kubnete\Content\Form\DocumentForm;
use Kubnete\Resource\Table\DocumentTable;
use Kubnete\Resource\Table\DocumentTypeTable;
use Kubnete\Resource\Table\PropertyTable;
use Kubnete\Resource\Table\PropertyValueTable;
use Kubnete\Resource\Table\TabTable;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentControllerFactory
 * @package Kubnete\Content\Factory
 */
class DocumentControllerFactory implements FactoryInterface
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
     * @return DocumentController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentController(
            $container->get(DocumentTable::class),
            $container->get(DocumentTypeTable::class),
            $container->get(TabTable::class),
            $container->get(PropertyTable::class),
            $container->get(PropertyValueTable::class),
            $container->get('FormElementManager')
                ->get(DocumentForm::class)
        );
    }
}
