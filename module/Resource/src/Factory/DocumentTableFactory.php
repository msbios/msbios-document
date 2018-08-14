<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Table\DocumentTableGateway;

use Kubnete\Resource\Table\PropertyValueTable;
use MSBios\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTableFactory
 * @package Kubnete\Resource\Factory
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
            $container->get(PropertyValueTable::class)
        );

        return new DocumentTableGateway($tableGateway);
    }
}
