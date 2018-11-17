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
use Zend\Db\ResultSet\ResultSet;
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
     * @return TabTableGateway
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ResultSet $resultSetPrototype */
        $resultSetPrototype = new ResultSet;
        $resultSetPrototype->setArrayObjectPrototype(new Tab);

        /** @var TableGateway $tableGateway */
        $tableGateway = new TableGateway(
            'doc_t_tabs',
            $container->get(Adapter::class),
            null,
            $resultSetPrototype
        );

        return new TabTableGateway($tableGateway);
    }
}
