<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\Property;
use MSBios\Document\Resource\Table\PropertyTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PropertyTableFactory
 * @package MSBios\Document\Resource\Factory
 */
class PropertyTableFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return PropertyTableGateway|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var Property $record */
        $record = new Property('id', 'doc_t_properties', $adapter);

        /** @var TableGatewayInterface $tableGateway */
        $tableGateway = new TableGateway(
            $record->getTable(),
            $adapter,
            new RowGatewayFeature($record)
        );

        return new PropertyTableGateway($tableGateway);
    }
}
