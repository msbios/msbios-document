<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Table\DocumentTableGateway;

use MSBios\Document\Resource\Table\PropertyValueTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
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
        /** @var ResultSet $resultSetPrototype */
        $resultSetPrototype = new ResultSet;

        /** @var Document $model */
        $model = new Document;
        $resultSetPrototype->setArrayObjectPrototype($model);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            'cnt_t_documents',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        $model->setPropertyValueTable(
            $container->get(PropertyValueTableGateway::class)
        );

        return new DocumentTableGateway($tableGateway);
    }
}
