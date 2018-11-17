<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\Tab;
use MSBios\Document\Resource\Table\TabTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TabTableGatewayFactory
 * @package MSBios\Document\Resource\Factory
 */
class TabTableGatewayFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return TabTableGateway|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var Tab $record */
        $record = new Tab('id', 'doc_t_tabs', $adapter);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            $record->getTable(),
            $adapter,
            new RowGatewayFeature($record)
        );

        return new $requestedName($tableGateway);
    }
}
