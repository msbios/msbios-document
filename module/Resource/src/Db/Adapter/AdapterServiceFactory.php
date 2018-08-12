<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Resource\Db\Adapter;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\AdapterServiceFactory as DefaultAdapterServiceFactory;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;

/**
 * Class AdapterServiceFactory
 * @package Kubnete\Resource\Db\Adapter
 */
class AdapterServiceFactory extends DefaultAdapterServiceFactory
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
     * @return AdapterInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = parent::__invoke($container, $requestedName, $options);
        GlobalAdapterFeature::setStaticAdapter($adapter);
        return $adapter;
    }
}
