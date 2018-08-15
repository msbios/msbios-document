<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Factory;

use Interop\Container\ContainerInterface;
use Kubnete\Development\Controller\DataTypeController;
use Kubnete\Development\Form\DataTypeForm;
use Kubnete\Resource\Table\DataTypeTableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DataTypeControllerFactory
 * @package Kubnete\Development\Factory
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
