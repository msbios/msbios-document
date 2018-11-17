<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Development\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Development\Form\Element\FieldSelect;
use MSBios\Document\Development\Form\Element\ViewSelect;
use MSBios\Document\Development\Module;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use MSBios\Resource\RecordRepository;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\Form\ElementInterface;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ViewSelectFactory
 * @package MSBios\Document\Development\Factory
 */
class ViewSelectFactory implements FactoryInterface
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
        $instance = new ViewSelect;

        /** @var RecordRepositoryInterface $tableGateway */
        $tableGateway = $container->get(TemplateTableGateway::class);

        /** @var Paginator $paginator */
        $paginator = $tableGateway->fetchAll(['type' => 'VIEW']);

        /** @var array $valueOptions */
        $valueOptions = [];

        foreach ($paginator as $row) {
            $valueOptions[$row['id']] = $row['name'];
        }

        $instance->setValueOptions($valueOptions);

        return $instance;
    }
}
