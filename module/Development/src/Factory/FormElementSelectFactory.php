<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Development\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Document\Development\Form\Element\FieldSelect;
use MSBios\Document\Development\Module;
use Zend\Form\ElementInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class FormElementSelectFactory
 * @package MSBios\Document\Development\Factory
 */
class FormElementSelectFactory implements FactoryInterface
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
        $instance = new FieldSelect;

        /** @var array $valueOptions */
        $valueOptions = [];

        /** @var array $datatypeInfo */
        foreach ($config['form_elements'] as $formElementInfo) {
            $valueOptions[$formElementInfo['factory']] = $formElementInfo['name'];
        }

        $instance->setValueOptions($valueOptions);

        return $instance;
    }
}
