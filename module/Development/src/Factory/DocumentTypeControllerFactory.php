<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Development\Controller\DocumentTypeController;
use Kubnete\Development\Form\DocumentTypeForm;
use Kubnete\Resource\Table\DocumentTypeTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTypeControllerFactory
 * @package Kubnete\Development\Factory
 */
class DocumentTypeControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentTypeController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentTypeController(
            $container->get(DocumentTypeTableGateway::class),
            $container->get('FormElementManager')->get(DocumentTypeForm::class)
        );
    }
}
