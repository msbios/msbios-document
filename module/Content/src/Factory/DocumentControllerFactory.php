<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Content\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use MSBios\Document\Content\Controller\DocumentController;
use MSBios\Document\Content\Form\DocumentForm;
use MSBios\Document\Resource\Table\DocumentTableGateway;
use MSBios\Document\Resource\Table\DocumentTypeGateway;
use MSBios\Document\Resource\Table\Property;
use MSBios\Document\Resource\Table\PropertyValue;
use MSBios\Document\Resource\Table\TabTableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentControllerFactory
 * @package MSBios\Document\Content\Factory
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
            $container->get(DocumentTableGateway::class),
            $container->get(DocumentTypeGateway::class),
            $container->get(TabTableGateway::class),
            $container->get(Property::class),
            $container->get(PropertyValue::class),
            $container->get('FormElementManager')
                ->get(DocumentForm::class)
        );
    }
}
