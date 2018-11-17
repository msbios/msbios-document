<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\CPanel\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\CPanel\Controller\TemplateController;
use MSBios\Document\Development\Form\TemplateForm;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TemplateControllerFactory
 * @package MSBios\Document\CPanel\Factory
 */
class TemplateControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return TemplateController|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new TemplateController(
            $container->get(TemplateTableGateway::class),
            $container->get('FormElementManager')->get(TemplateForm::class)
        );
    }
}
