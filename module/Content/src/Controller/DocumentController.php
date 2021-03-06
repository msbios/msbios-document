<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Content\Controller;

use MSBios\Document\Content\Form\DocumentForm as DocumentForm;
use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Record\DocumentType;
use MSBios\Document\Resource\Record\Property;
use MSBios\Document\Resource\Record\Tab;
use MSBios\Document\Resource\Table\DocumentTableGateway;
use MSBios\CPanel\Mvc\Controller\AbstractActionController;
use Zend\Db\ResultSet\ResultSet;
use Zend\View\Model\ViewModel;

/**
 * Class DocumentController
 * @package MSBios\Document\Content\Controller
 */
class DocumentController extends AbstractActionController
{
    /** @const ROUTE_PATH */
    const ROUTE_PATH = 'backend/content/document';

    /** @var DocumentTableGateway */
    protected $documentTable;

    /** @var DocumentTypeGateway */
    protected $documentTypeTable;

    /** @var Tab */
    protected $tabTable;

    /** @var Property */
    protected $propertyTable;

    /** @var PropertyValue */
    protected $propertyValueTable;

    /** @var DocumentForm */
    protected $form;

    /**
     * DocumentController constructor.
     * @param DocumentTableGateway $objDocumentTable
     * @param DocumentTypeGateway $objDocumentTypeTable
     * @param Tab $objTabTable
     * @param \MSBios\Document\Content\Controller\Property $objPropertyTable
     * @param PropertyValue $objPropertyValueTable
     * @param DocumentForm $objDocumentForm
     */
    public function __construct(
        DocumentTableGateway $objDocumentTable,
        DocumentTypeGateway $objDocumentTypeTable,
        Tab $objTabTable,
        Property $objPropertyTable,
        PropertyValue $objPropertyValueTable,
        DocumentForm $objDocumentForm
    ) {

        $this->documentTable = $objDocumentTable;
        $this->documentTypeTable = $objDocumentTypeTable;
        $this->tabTable = $objTabTable;
        $this->propertyTable = $objPropertyTable;
        $this->propertyValueTable = $objPropertyValueTable;
        $this->form = $objDocumentForm;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel([
            'documents' => $this->documentTable->fetchAll(),
            'form' => $this->form
        ]);
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function addAction()
    {
        $this->form->setAttribute(
            'action',
            $this->url()->fromRoute(self::ROUTE_PATH . '/add')
        );

        if ($this->getRequest()->isPost()) {

            /** @var Document $document */
            $document = new Document;
            $this->form->setInputFilter($document->getInputFilter());
            $this->form->setData($this->params()->fromPost());

            if ($this->form->isValid()) {
                $document->exchangeArray($this->form->getData());
                $this->flashMessenger()
                    ->addMessage(
                        sprintf("Document '%s' was added.", $document['name'])
                    );

                $this->documentTable->save($document);

                return $this->redirect()->toRoute('backend/content/document');
            }
        }

        return new ViewModel([
            'form' => $this->form
        ]);
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function editAction()
    {
        /** @var int $id */
        $id = (int)$this->params()
            ->fromRoute('id', 0);

        if (! $id) {
            return $this->redirect()
                ->toRoute(self::ROUTE_PATH . '/add');
        }

        try {
            /** @var Document $objDocumentRow */
            $objDocumentRow = $this->documentTable
                ->getDocument($id);
        } catch (\Exception $ex) {
            return $this->redirect()
                ->toRoute(self::ROUTE_PATH);
        }

        $this->form->setAttribute(
            'action',
            $this->url()->fromRoute(self::ROUTE_PATH . '/edit', [
                'id' => $objDocumentRow['id']
            ])
        );

        /** @var DocumentType $objDocumentTypeRow */
        $objDocumentTypeRow = $this->documentTypeTable
            ->findDocumentTypeByDocument($objDocumentRow);

        /** @var ResultSet $objPropertyResultSet */
        $objPropertyResultSet = $this->propertyTable
            ->fetchPropertyByDocumentType($objDocumentTypeRow);

        $objPropertyResultSet->buffer();

        /** @var ResultSet $objValueResultSet */
        $objValueResultSet = $this->propertyValueTable
            ->fetchByDocument($objDocumentRow);

        $objValueResultSet->buffer();

        $this->form->initialization(
            $objDocumentRow,
            $objPropertyResultSet,
            $objValueResultSet
        );

        $this->form->bind($objDocumentRow);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter($objDocumentRow->getInputFilter());
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {

                /** @var array $objDocumentData */
                $objDocumentData = $this->form->getData();
                $objDocumentRow->exchangeArray($objDocumentData);
                $this->documentTable->save($objDocumentRow);

                foreach ($objDocumentData['values'] as $arrValueRow) {
                    /** @var Property\Value $objValueRow */
                    $objValueRow = new Property\Value($arrValueRow);
                    $this->propertyValueTable->save($objValueRow);
                }

                $this->flashMessenger()
                    ->addMessage(
                        sprintf("Document '%s' has been edited.", $objDocumentRow['name'])
                    );
                return $this->redirect()
                    ->toRoute(self::ROUTE_PATH);
            }
        }

        /** @var ResultSet $objTabResultSet */
        $objTabResultSet = $this->tabTable
            ->fetchByDocumentType($objDocumentTypeRow);

        $objTabResultSet->buffer();

        /** @var array $arrTabs */
        $arrTabs = [];

        /** @var Tab $objTabRow */
        foreach ($objTabResultSet as $objTabRow) {
            $objTabRow['properties'] = [];

            /** @var Property $objPropertyRow */
            foreach ($objPropertyResultSet as $objPropertyRow) {
                if ($objPropertyRow['tab_id'] == $objTabRow['id']) {
                    $objTabRow['properties'][] = $objPropertyRow;
                }
            }

            $arrTabs[] = $objTabRow;
        }

        return new ViewModel([
            'form' => $this->form,
            'tabs' => $arrTabs
        ]);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function deleteAction()
    {
        /** @var string $id */
        $id = $this->params()->fromRoute('id');

        if ($document = $this->documentTable->getDocument($id)) {
            $this->flashMessenger()
                ->addMessage(
                    sprintf("Document '%s' was deleted.", $document['name'])
                );
            $this->documentTable->deleteDocument($id);
        }

        return $this->redirect()->toRoute('backend/content/document');
    }
}
