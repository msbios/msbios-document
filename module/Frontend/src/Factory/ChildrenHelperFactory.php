<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Frontend\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Frontend\View\Helper\ChildrenHelper;
use Kubnete\Frontend\View\Helper\DocumentHelper;
use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Table\DocumentTableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ChildrenHelperFactory
 * @package Kubnete\Frontend\Factory
 */
class ChildrenHelperFactory implements FactoryInterface
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
     * @return DocumentHelper
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ChildrenHelper(
            $container->get(DocumentTableGateway::class),
            $container->get(Document::class)
        );
    }
}
