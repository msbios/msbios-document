<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\DataType;
use MSBios\Document\Resource\Table\DataTypeTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
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
        /** @var ResultSet $resultSetPrototype */
        $resultSetPrototype = new ResultSet;
        $resultSetPrototype->setArrayObjectPrototype(new DataType);

        /** @var TableGatewayInterface $tableGateway */
        $tableGateway = new TableGateway(
            'sys_t_datatypes',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        return new DataTypeTableGateway($tableGateway);
    }
}
