<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Table\PropertyValueTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PropertyValueTableGatewayFactory
 * @package Kubnete\Resource\Factory
 */
class PropertyValueTableGatewayFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return PropertyValueTableGateway
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ResultSet $resultSetPrototype */
        $resultSetPrototype = new ResultSet;
        $resultSetPrototype->setArrayObjectPrototype(new Value);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            'doc_t_property_values',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        return new PropertyValueTableGateway($tableGateway);
    }
}
