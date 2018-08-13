<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 19.01.17
 * Time: 12:08
 */

namespace Kubnete\Content\Form;

use Kubnete\Resource\Form\Element\DocumentTypeElement;
use Kubnete\Resource\Form\Element\LayoutElement;
use Kubnete\Resource\Form\Element\ViewElement;
use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Property;
use Zend\Db\ResultSet\ResultSet;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\AbstractPluginManager;

/**
 * Class DocumentForm
 * @package Kubnete\Content\Form
 */
class DocumentForm extends Form
{
    /** @var AbstractPluginManager */
    protected $abstractPluginManager;

    /**
     * DocumentForm constructor.
     * @param AbstractPluginManager $abstractPluginManager
     * @param array|string $name
     * @param array|null $options
     */
    public function __construct(
        AbstractPluginManager $abstractPluginManager,
        $name = __CLASS__,
        array $options = null
    ) {

        $this->abstractPluginManager = $abstractPluginManager;
        parent::__construct($name, $options);
        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'name' => 'id',
            'type' => Hidden::class
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
            'name' => 'uri',
            'type' => Text::class,
            'options' => [
                'label' => 'Uri'
            ]
        ]);

        /** @var DocumentTypeElement $objDocumentTypeElement */
        $objDocumentTypeElement = $this->abstractPluginManager
            ->get(DocumentTypeElement::class)
            ->setName('document_type_id')
            ->setLabel('Document Type');
        $this->add($objDocumentTypeElement);
    }


    /**
     * @param Document $objRow
     * @param ResultSet $objPropertyResultSet
     * @param ResultSet $objValueResultSet
     */
    public function initialization(
        Document $objRow,
        ResultSet $objPropertyResultSet,
        ResultSet $objValueResultSet
    ) {

        /** @var ViewElement $objViewElement */
        $objViewElement = $this->abstractPluginManager
            ->get(ViewElement::class)
            ->setName('view_id')
            ->setLabel('View');
        $this->add($objViewElement);

        /** @var LayoutElement $objLayoutElement */
        $objLayoutElement = $this->abstractPluginManager
            ->get(LayoutElement::class)
            ->setName('layout_id')
            ->setLabel('Layout');

        $this->add($objLayoutElement);

        /** @var Fieldset $objValuesFieldSet */
        $objValuesFieldSet = new Fieldset('values');

        /** @var Property $objProperyRow */
        foreach ($objPropertyResultSet as $objProperyRow) {
            /** @var string $strIdentifier */
            $strIdentifier = $objProperyRow['identifier'];

            /** @var Fieldset $objValueFieldSet */
            $objValueFieldSet = new Fieldset($strIdentifier);

            /** @var Hidden $objId */
            $objId = new Hidden('id');
            $objValueFieldSet->add($objId);

            /** @var Hidden $objId */
            $objDocumentId = new Hidden('document_id');
            $objDocumentId->setValue($objRow['id']);
            $objValueFieldSet->add($objDocumentId);

            /** @var Hidden $objPropertyId */
            $objPropertyId = new Hidden('property_id');
            $objPropertyId->setValue($objProperyRow['id']);
            $objValueFieldSet->add($objPropertyId);

            /** @var Hidden $objValue */
            $objValue = $this->abstractPluginManager
                ->get($objProperyRow['form_element']);
            $objValue->setName('value');

            $objValueFieldSet->add($objValue);

            foreach ($objValueResultSet as $objValueRow) {
                if ($objValueRow['property'] != $strIdentifier) {
                    continue;
                }

                $objValueFieldSet->get('id')->setValue($objValueRow['id']);
                $objValueFieldSet->get('value')->setValue($objValueRow['value']);
            }

            $objValuesFieldSet->add($objValueFieldSet);
        }

        $this->add($objValuesFieldSet);
    }
}
