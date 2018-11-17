<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Table\DocumentTableGateway;
use MSBios\Document\Resource\Table\PropertyValueTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTableFactory
 * @package MSBios\Document\Resource\Factory
 */
class DocumentTableFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentTableGateway
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var Document $record */
        $record = new Document('id', 'cnt_t_documents', $adapter);

        /** @var RowGatewayFeature $feature */
        $feature = new RowGatewayFeature($record);

        // /** @var ResultSet $resultSetPrototype */
        // $resultSetPrototype = new ResultSet;
        // $resultSetPrototype->setArrayObjectPrototype($record);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            $record->getTable(),
            $adapter,
            $feature //,
            // $resultSetPrototype
        );

        return new DocumentTableGateway($tableGateway);
    }
}
