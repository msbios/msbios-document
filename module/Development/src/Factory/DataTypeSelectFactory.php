<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Development\Form\Element\DataTypeSelect;
use Kubnete\Development\Form\Element\FieldSelect;
use Kubnete\Development\Form\Element\ViewSelect;
use Kubnete\Development\Module;
use Kubnete\Resource\Table\DataTypeTableGateway;
use Kubnete\Resource\Table\TemplateTableGateway;
use MSBios\Resource\RecordRepository;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\Form\ElementInterface;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeSelectFactory
 * @package Kubnete\Development\Factory
 */
class DataTypeSelectFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FieldSelect|ElementInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var array $config */
        $config = $container->get(Module::class);

        /** @var ElementInterface $instance */
        $instance = new DataTypeSelect;

        /** @var RecordRepositoryInterface $tableGateway */
        $tableGateway = $container->get(DataTypeTableGateway::class);

        /** @var Paginator $paginator */
        $paginator = $tableGateway->fetchAll();

        /** @var array $valueOptions */
        $valueOptions = [];

        foreach ($paginator as $row) {
            $valueOptions[$row['id']] = $row['name'];
        }

        $instance->setValueOptions($valueOptions);

        return $instance;
    }
}
