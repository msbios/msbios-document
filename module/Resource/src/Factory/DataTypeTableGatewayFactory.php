<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\DataType;
use MSBios\Document\Resource\Resources;
use MSBios\Document\Resource\Table\DataTypeTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeTableGatewayFactory
 * @package MSBios\Document\Resource\Factory
 */
class DataTypeTableGatewayFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DataTypeTableGateway|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var DataType $record */
        $record = new DataType('id', Resources::SYS_T_DATATYPES, $adapter);

        /** @var TableGatewayInterface $tableGateway */
        $tableGateway = new TableGateway(
            $record->getTable(),
            $adapter,
            new RowGatewayFeature($record)
        );

        return new DataTypeTableGateway($tableGateway);
    }
}
