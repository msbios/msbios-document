<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\DataType\Form\Element\Select;
use Kubnete\Development\Controller\TemplateController;
use Kubnete\Development\Form\DataTypeForm;
use Kubnete\Development\Form\DocumentTypeForm;
use Kubnete\Development\Form\TemplateForm;
use Kubnete\Development\Form\TypeTabFieldset;
use Kubnete\Resource\Form\Element\ViewElement;
use Kubnete\Resource\Table\TemplateTableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DocumentTypeFormFactory
 * @package Kubnete\Development\Factory
 */
class DocumentTypeFormFactory implements FactoryInterface
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
        /** @var ServiceLocatorInterface $formElementManager */
        $formElementManager = $container->get('FormElementManager');
        return new DocumentTypeForm(
            $formElementManager->get(ViewElement::class),
            $formElementManager->get(TypeTabFieldset::class)
        );
    }
}
