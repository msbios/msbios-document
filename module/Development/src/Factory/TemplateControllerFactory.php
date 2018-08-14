<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Development\Controller\TemplateController;
use Kubnete\Development\Form\TemplateForm;
use Kubnete\Resource\Table\TemplateTableGateway;;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TemplateControllerFactory
 * @package Kubnete\Development\Factory
 */
class TemplateControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return TemplateController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new TemplateController(
            $container->get(TemplateTableGateway::class),
            $container->get('FormElementManager')->get(TemplateForm::class)
        );
    }
}
