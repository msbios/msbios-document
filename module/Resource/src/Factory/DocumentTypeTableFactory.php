<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Resource\Record\DocumentType;
use Kubnete\Resource\Table\DocumentTypeTable;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTypeTableFactory
 * @package Kubnete\Resource\Factory
 */
class DocumentTypeTableFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentTypeTable
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ResultSet $resultSetPrototype */
        $resultSetPrototype = new ResultSet;
        $resultSetPrototype->setArrayObjectPrototype(new DocumentType);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            'dev_t_document_types',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        return new DocumentTypeTable($tableGateway);
    }
}
