<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Form\Element\ViewElement;
use MSBios\Document\Resource\Table\PropertyValue;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ViewElementFactory
 * @package MSBios\Document\Resource\Factory
 */
class ViewElementFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ViewElement|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ViewElement(
            $container->get(TemplateTableGateway::class)
        );
    }
}
