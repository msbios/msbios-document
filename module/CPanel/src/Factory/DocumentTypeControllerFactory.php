<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\CPanel\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\CPanel\Controller\DocumentTypeController;
use MSBios\Document\Development\Form\DocumentTypeForm;
use MSBios\Document\Resource\Table\DocumentTypeTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTypeControllerFactory
 * @package MSBios\Document\CPanel\Factory
 */
class DocumentTypeControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentTypeController|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentTypeController(
            $container->get(DocumentTypeTableGateway::class),
            $container->get('FormElementManager')->get(DocumentTypeForm::class)
        );
    }
}
