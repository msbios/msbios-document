<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 23.01.17
 * Time: 11:25
 */

namespace Kubnete\DataType\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\DataType\Module;
use Zend\Config\Config;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ModuleFactory implements FactoryInterface
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
     * @return Config
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Config($container->get('config')[Module::class]);
    }
}
