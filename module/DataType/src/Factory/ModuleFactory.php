<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\DataType\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\DataType\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ModuleFactory
 * @package Kubnete\DataType\Factory
 */
class ModuleFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return mixed
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $container->get('config')[Module::class];
    }
}
