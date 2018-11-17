<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Development\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use MSBios\Document\DataType\Form\Element\Select;
use MSBios\Document\Development\Controller\TemplateController;
use MSBios\Document\Development\Form\DataTypeForm;
use MSBios\Document\Development\Form\DocumentTypeForm;
use MSBios\Document\Development\Form\TemplateForm;
use MSBios\Document\Development\Form\TypeTabFieldset;
use MSBios\Document\Resource\Form\Element\ViewElement;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DocumentTypeFormFactory
 * @package MSBios\Document\Development\Factory
 */
class DocumentTypeFormFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentTypeForm
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ServiceLocatorInterface $formElementManager */
        $formElementManager = $container->get('FormElementManager');
        return new DocumentTypeForm;
    }
}
