<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Development\Factory\TypeTab;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use MSBios\Document\Development\Form\TypeTab\PropertyFieldset;
use MSBios\Document\Resource\Form\Element\DataTypeElement;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PropertyFieldsetFactory
 * @package MSBios\Document\Development\Factory\TypeTab
 */
class PropertyFieldsetFactory implements FactoryInterface
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
     * @return PropertyFieldset
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PropertyFieldset(
            $container->get('FormElementManager')
                ->get(DataTypeElement::class)
        );
    }
}
