<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Controller\IndexController;
use MSBios\Document\DocumentService;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class IndexControllerFactory
 * @package MSBios\Document\Factory
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return IndexController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        var_dump($container->get(DocumentService::class)); die();
        return new IndexController($container->get(DocumentService::class));
    }
}