<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Development\Controller;

use Kubnete\CPanel\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayObject;

// use Kubnete\Resource\Table\DocumentTypeGateway;

/**
 * Class DocumentTypeController
 * @package Kubnete\Development\Controller
 */
class DocumentTypeController extends AbstractActionController
{

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        /** @var EventManagerInterface $eventManager */
        $eventManager = $e->getTarget()
            ->getEventManager();
        $eventManager->attach(self::EVENT_PRE_BIND_DATA, [$this, 'onPreBindData']);
        return parent::onDispatch($e);
    }

    /**
     * @param EventInterface $e
     */
    public function onPreBindData(EventInterface $e)
    {
        /** @var ArrayObject $row */
        $row = $e->getParam('row');
        $row['tabs'] = [
            [
                'id' => 1,
                'documenttypeid' => 1,
                'name' => 'Name',
                'description' => 'Description',
                'orderkey' => 1,
            ],
            [
                'id' => 1,
                'documenttypeid' => 1,
                'name' => 'Name',
                'description' => 'Description',
                'orderkey' => 1
            ]
        ];
    }

//    /** @var DocumentTypeGateway */
//    protected $resource;
//
//    /** @var Tab */
//    protected $tabTable;
//
//    /** @var Property */
//    protected $propertyTable;
//
//    /** @var DocumentTypeForm */
//    protected $form;
//
//    /** @const DEFAULT_ITEM_COUNT_PER_PAGE */
//    const DEFAULT_ITEM_COUNT_PER_PAGE = 10;
//
//    /** @const DEFAULT_CURRENT_PAGE_NUMBER */
//    const DEFAULT_CURRENT_PAGE_NUMBER = 1;

//    /**
//     * DocumentTypeController constructor.
//     * @param DocumentTypeGateway $resource
//     * @param Tab $tabTable
//     * @param Property $propertyTable
//     * @param DocumentTypeForm $form
//     */
//    public function __construct(
//        DocumentTypeGateway $resource,
//        Tab $tabTable,
//        Property $propertyTable,
//        DocumentTypeForm $form
//    ) {
//
//        $this->resource = $resource;
//        $this->tabTable = $tabTable;
//        $this->propertyTable = $propertyTable;
//        $this->form = $form;
//    }

//    /**
//     * @return \Zend\Http\Response|ViewModel
//     */
//    public function addAction()
//    {
//        $this->form->setAttribute(
//            'action',
//            $this->url()->fromRoute(self::ROUTE_PATH . '/add')
//        );
//
//        if ($this->getRequest()->isPost()) {
//
//            /** @var DocumentType $row */
//            $row = new DocumentType;
//            $this->form->setInputFilter($row->getInputFilter());
//            $this->form->setData($this->params()->fromPost());
//
//            if ($this->form->isValid()) {
//                $row->exchangeArray($this->form->getData());
//                $this->resource->save($row);
//
//                $this->flashMessenger()
//                    ->addMessage(
//                        sprintf("Template '%s' was added.", $row['name'])
//                    );
//                return $this->redirect()
//                    ->toRoute(self::ROUTE_PATH);
//            }
//        }
//
//        return new ViewModel([
//            'form' => $this->form
//        ]);
//    }
//
//    /**
//     * @return \Zend\Http\Response|ViewModel
//     */
//    public function editAction()
//    {
//        /** @var int $id */
//        $id = (int)$this->params()
//            ->fromRoute('id', 0);
//
////        if (! $id) {
////            return $this->redirect()
////                ->toRoute(self::ROUTE_PATH . '/add');
////        }
//
//        try {
//            /** @var DocumentType $type */
//            $type = $this->resource->fetch($id);
//
//            /** @var ResultSet $tabs */
//            $tabs = $this->tabTable
//                ->fetchByDocumentType($type);
//
//            $type['tabs'] = [];
//
//            /** @var DocumentType\Tab $tab */
//            foreach ($tabs as $tab) {
//                $tab['properties'] = $this->propertyTable
//                    ->fetchByTab($tab)->buffer();
//
//                $type['tabs'][] = $tab;
//            }
//        } catch (\Exception $ex) {
//            return $this->redirect()
//                ->toRoute(self::ROUTE_PATH);
//        }
//
//        $this->form->setAttribute(
//            'action',
//            $this->url()->fromRoute(self::ROUTE_PATH . '/edit', [
//                'id' => $type['id']
//            ])
//        );
//
//        $this->form->bind($type);
//
//        /** @var Request $request */
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $this->form->setInputFilter($type->getInputFilter());
//            $this->form->setData($request->getPost());
//
//            if ($this->form->isValid()) {
//
//                /** @var DocumentType $object */
//                $object = $this->form->getData();
//
//                $type->exchangeArray($this->form->getData());
//                $this->resource->save($type);
//
//                foreach ($object['tabs'] as $tab) {
//                    $tab['document_type_id'] = $type['id'];
//                    $this->tabTable->save($tab);
//
//                    foreach ($tab['properties'] as $property) {
//                        $property['tab_id'] = $tab['id'];
//                        $this->propertyTable->save($property);
//                    }
//                }
//
//                $this->flashMessenger()
//                    ->addMessage(
//                        sprintf("Document type '%s' has been edited.", $type['name'])
//                    );
//                return $this->redirect()
//                    ->toRoute(self::ROUTE_PATH);
//            }
//        }
//
//        return new ViewModel([
//            'form' => $this->form
//        ]);
//    }
//
//    /**
//     * @return \Zend\Http\Response
//     */
//    public function deleteAction()
//    {
//        /** @var string $id */
//        $id = $this->params()->fromRoute('id');
//
//        if ($row = $this->table->getDataType($id)) {
//            $this->flashMessenger()
//                ->addMessage(
//                    sprintf("DataType '%s' was deleted.", $row['name'])
//                );
//            $this->table->deleteD($id);
//        }
//
//        return $this->redirect()->toRoute('backend/content/document');
//    }
}
