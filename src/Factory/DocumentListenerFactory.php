<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Resource\Table\DocumentTableGateway;
use MSBios\Document\DocumentListener;
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
     * @return DocumentListener
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentListener(
            $container->get(DocumentTableGateway::class)
        );
    }
}