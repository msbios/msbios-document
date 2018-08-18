<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Development\Controller;

use Kubnete\CPanel\Mvc\Controller\AbstractActionController;
use Kubnete\Resource\Record\Tab;
use Kubnete\Resource\Table\PropertyTableGateway;
use Kubnete\Resource\Table\TabTableGateway;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\EventManager\Event;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayObject;

/**
 * Class DocumentTypeController
 * @package Kubnete\Development\Controller
 */
class DocumentTypeController extends AbstractActionController
{

    /** @var RecordRepositoryInterface */
    protected $tabs;

    /** @var RecordRepositoryInterface */
    protected $properties;

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $e->getApplication()->getServiceManager();
        $this->tabs = $serviceManager->get(TabTableGateway::class);
        $this->properties = $serviceManager->get(PropertyTableGateway::class);

        /** @var EventManagerInterface $eventManager */
        $eventManager = $e->getTarget()
            ->getEventManager();
        $eventManager->attach(self::EVENT_PRE_BIND_DATA, [$this, 'onPreBindData']);
        return parent::onDispatch($e);
    }

    /**
     * @param EventInterface|Event $e
     */
    public function onPreBindData(EventInterface $e)
    {
        /** @var ArrayObject $row */
        $row = $e->getParam('row');

        /** @var Paginator $tabs */
        $tabs = $this->tabs->fetchAll(['documenttypeid' => $row['id']]);

        $tabs = $tabs->getCurrentItems();

        /**
         * @var int $i
         * @var Tab $tab
         */
        foreach ($tabs as $i => $tab) {
            $tab['properties'] = $this->properties->fetchAll(['tabid' => $tab['id']]);
            $tabs[$i] = $tab;
        }

        $row['tabs'] = $tabs;
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
