<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Kubnete\Resource\Model\DocumentType;
use Kubnete\Resource\Table\DocumentTypeTable;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DocumentTypeTableFactory
 * @package Kubnete\Resource\Factory
 */
class DocumentTypeTableFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
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
