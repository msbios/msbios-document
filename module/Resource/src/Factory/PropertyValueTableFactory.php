<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Resource\Record\Property;
use Kubnete\Resource\Table\PropertyValueTable;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PropertyValueTableFactory
 * @package Kubnete\Resource\Factory
 */
class PropertyValueTableFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return PropertyValueTable
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ResultSet $resultSetPrototype */
        $resultSetPrototype = new ResultSet;
        $resultSetPrototype->setArrayObjectPrototype(new Property\Value);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            'doc_t_property_values',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        return new PropertyValueTable($tableGateway);
    }
}
