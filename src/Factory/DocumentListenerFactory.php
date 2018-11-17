<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Table\DocumentTableGateway;
use MSBios\Document\DocumentListenerAggregate;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentListenerFactory
 * @package MSBios\Document\Factory
 */
class DocumentListenerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentListenerAggregate
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentListenerAggregate(
            $container->get(DocumentTableGateway::class)
        );
    }
}