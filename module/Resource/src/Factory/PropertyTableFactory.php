<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Resource\Record\Property;
use Kubnete\Resource\Table\PropertyTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PropertyTableFactory
 * @package Kubnete\Resource\Factory
 */
class PropertyTableFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return PropertyTableGateway
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ResultSetInterface $resultSetPrototype */
        $resultSetPrototype = new ResultSet;
        $resultSetPrototype->setArrayObjectPrototype(new Property);

        /** @var TableGatewayInterface $tableGateway */
        $tableGateway = new TableGateway(
            'doc_t_properties',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        return new PropertyTableGateway($tableGateway);
    }
}
