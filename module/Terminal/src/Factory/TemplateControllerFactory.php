<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 1/16/17
 * Time: 11:01 PM
 */

namespace Kubnete\Terminal\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Terminal\Controller\TemplateController;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TemplateControllerFactory
 * @package Kubnete\Console\Factory
 */
class TemplateControllerFactory implements FactoryInterface
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
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new TemplateController(
            // $container->get(TemplateT)
        );
    }
}
