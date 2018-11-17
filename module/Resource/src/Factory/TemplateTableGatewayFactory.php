<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Resource\Record\Template;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TemplateTableGatewayFactory
 * @package MSBios\Document\Resource\Factory
 */
class TemplateTableGatewayFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return TemplateTableGateway
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var Template $record */
        $record = new Template('id', 'sys_t_templates', $adapter);

        /** @var RowGatewayFeature $feature */
        $feature = new RowGatewayFeature($record);

        // /** @var ResultSet $resultSetPrototype */
        // $resultSetPrototype = new ResultSet;
        // $resultSetPrototype->setArrayObjectPrototype(new Template);

        /** @var TableGatewayInterface $tableGateway */
        $tableGateway = new TableGateway(
            $record->getTable(),
            $adapter,
            $feature
        );

        return new TemplateTableGateway($tableGateway);
    }
}
