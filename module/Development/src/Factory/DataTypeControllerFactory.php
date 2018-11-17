<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Development\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Development\Controller\DataTypeController;
use MSBios\Document\Development\Form\DataTypeForm;
use MSBios\Document\Resource\Table\DataTypeTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeControllerFactory
 * @package MSBios\Document\Development\Factory
 */
class DataTypeControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DataTypeController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new DataTypeController(
            $container->get(DataTypeTableGateway::class),
            $container->get('FormElementManager')->get(DataTypeForm::class)
        );
    }
}
