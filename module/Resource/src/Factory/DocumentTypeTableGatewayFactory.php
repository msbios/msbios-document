<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\DocumentType;
use MSBios\Document\Resource\Resources;
use MSBios\Document\Resource\Table\DocumentTypeTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTypeTableFactory
 * @package MSBios\Document\Resource\Factory
 */
class DocumentTypeTableGatewayFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentTypeTableGateway|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var DocumentType $record */
        $record = new DocumentType('id', Resources::DEV_T_DOCUMENT_TYPES, $adapter);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            $record->getTable(),
            $adapter,
            new RowGatewayFeature($record)
        );

        return new $requestedName($tableGateway);
    }
}
