<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Resource\Form\Element\ViewElement;
use Kubnete\Resource\Record\DataType;
use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Table\DataTypeTable;
use Kubnete\Resource\Table\DocumentTableGateway;
use Kubnete\Resource\Table\PropertyValueTable;
use Kubnete\Resource\Table\TemplateTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ViewElementFactory
 * @package Kubnete\Resource\Factory
 */
class ViewElementFactory implements FactoryInterface
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
     * @return DocumentTableGateway
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ViewElement(
            $container->get(TemplateTableGateway::class)
        );
    }
}
