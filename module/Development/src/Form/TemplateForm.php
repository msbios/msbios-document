<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Form;

use Kubnete\Resource\Form\Element\TemplateTypeElement;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;

/**
 * Class TemplateForm
 * @package Kubnete\Development\Form
 */
class TemplateForm extends Form
{
    /**
     * TemplateForm constructor.
     * @param int|null|string $name
     * @param array|null $options
     */
    public function __construct($name = __CLASS__, array $options = null)
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);

        $this->add([
            'name' => 'type',
            'type' => TemplateTypeElement::class,
            'options' => [
                'label' => 'Type',
            ]
        ]);

        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Name',
                'label_attributes' => [
                    'class'  => 'control-label'
                ],
            ]
        ]);

        $this->add([
            'name' => 'identifier',
            'type' => Text::class,
            //'options' => [
            //    'label' => 'Identifier',
            //    'label_attributes' => [
            //        'class'  => 'control-label'
            //    ],
            //],
        ]);

        $this->add([
            'name' => 'description',
            'type' => Text::class,
            //'options' => [
            //    'label' => 'Description',
            //    'label_attributes' => [
            //        'class'  => 'control-label'
            //    ],
            //],
        ]);

        $this->add([
            'name' => 'content',
            'type' => Textarea::class,
            //'attributes' => [
            //    'id' => 'mirror',
            //],
            //
            //'options' => [
            //    'label' => 'Content',
            //    'label_attributes' => [
            //        'class'  => 'control-label'
            //    ],
            //],
        ]);
    }
}
