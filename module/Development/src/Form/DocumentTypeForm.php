<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 19.01.17
 * Time: 12:08
 */

namespace Kubnete\Development\Form;

use Kubnete\DataType\Form\Element\Select;
use Kubnete\Resource\Form\Element\TemplateTypeElement;
use Kubnete\Resource\Form\Element\ViewElement;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\InputFilter\InputFilter;

/**
 * Class DocumentTypeForm
 * @package Kubnete\Development\Form
 */
class DocumentTypeForm extends Form
{
    /**
     * DocumentTypeForm constructor.
     * @param ViewElement $viewId
     * @param TypeTabFieldset $typeTabFieldset
     * @param string $name
     * @param array|null $options
     */
    public function __construct(
        ViewElement $viewId,
        TypeTabFieldset $typeTabFieldset,
        $name = __CLASS__,
        array $options = null
    ) {

        parent::__construct($name, $options);
        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
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
            'name' => 'description',
            'type' => Text::class,
            'options' => [
                'label' => 'Description',
                'label_attributes' => [
                    'class'  => 'control-label'
                ],
            ]
        ]);

        $viewId->setName('default_view_id');
        $viewId->setOptions([
            'label' => 'Default view',
            'label_attributes' => [
                'class'  => 'control-label'
            ],
        ]);
        $this->add($viewId);

        $this->add([
            'type' => Collection::class,
            'name' => 'tabs',
            'options' => [
                'should_create_template' => false,
                'allow_add' => true,
                'allow_remove' => true,
                'count' => 0,
                'target_element' => $typeTabFieldset,
            ],
        ]);
    }
}
