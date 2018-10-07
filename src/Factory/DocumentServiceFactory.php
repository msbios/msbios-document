<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\DocumentService;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentServiceFactory
 * @package MSBios\Document\Factory
 */
class DocumentServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DocumentService;
    }
}