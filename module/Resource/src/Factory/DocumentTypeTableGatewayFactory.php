<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\DocumentType;
use MSBios\Document\Resource\Table\DocumentTypeTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
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
     * @return DocumentTypeTableGateway
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

        return new DocumentTypeTableGateway($tableGateway);
    }
}
