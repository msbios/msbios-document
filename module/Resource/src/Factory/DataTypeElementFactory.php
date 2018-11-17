<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Form\Element\DataTypeElement;
use MSBios\Document\Resource\Table\DataTypeTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeElementFactory
 * @package MSBios\Document\Resource\Factory
 */
class DataTypeElementFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DataTypeElement|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DataTypeElement(
            $container->get(DataTypeTableGateway::class)
        );
    }
}
