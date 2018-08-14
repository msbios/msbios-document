<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Controller;

use Kubnete\Development\Form\DataTypeForm;
use Kubnete\Development\Form\TemplateForm;
use Kubnete\Resource\Record\DataType;
use Kubnete\Resource\Table\DataTypeTable;
use Kubnete\Resource\Table\TemplateTableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class DataTypeController
 * @package Kubnete\Development\Controller
 */
class DataTypeController extends AbstractActionController
{
    /** @var TemplateTableGateway */
    protected $table;

    /** @var TemplateForm */
    protected $form;

    /**
     * DataTypeController constructor.
     * @param DataTypeTable $table
     * @param DataTypeForm $form
     */
    public function __construct(DataTypeTable $table, DataTypeForm $form)
    {
        $this->table = $table;
        $this->form = $form;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $this->form->setAttribute(
            'action',
            $this->url()->fromRoute('cpanel/development/data-type/add')
        );

        return new ViewModel([
            'dataTypes' => $this->table->fetchAll(),
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
            $this->url()->fromRoute('cpanel/development/data-type/add')
        );

        if ($this->getRequest()->isPost()) {

            /** @var DataType $row */
            $row = new DataType;
            $this->form->setInputFilter($row->getInputFilter());
            $this->form->setData($this->params()->fromPost());

            if ($this->form->isValid()) {
                $row->exchangeArray($this->form->getData());
                $this->table->save($row);

                $this->flashMessenger()
                    ->addMessage(
                        sprintf("Data type '%s' was added.", $row['name'])
                    );
                return $this->redirect()
                    ->toRoute('cpanel/development/data-type');
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
                ->toRoute('cpanel/development/data-type/add');
        }

        try {
            /** @var DataType $row */
            $row = $this->table
                ->getDataType($id);
        } catch (\Exception $ex) {
            return $this->redirect()
                ->toRoute('cpanel/development/data-type');
        }

        $this->form->setAttribute(
            'action',
            $this->url()->fromRoute('cpanel/development/data-type/edit', [
                'id' => $row['id']
            ])
        );

        $this->form->bind($row);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter($row->getInputFilter());
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $row->exchangeArray($this->form->getData());
                $this->table->save($row);

                $this->flashMessenger()
                    ->addMessage(
                        sprintf("Data type '%s' has been edited.", $row['name'])
                    );
                return $this->redirect()
                    ->toRoute('cpanel/development/data-type');
            }
        }

        return new ViewModel([
            'form' => $this->form
        ]);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function deleteAction()
    {
        /** @var string $id */
        $id = $this->params()
            ->fromRoute('id');

        if ($row = $this->table->getDataType($id)) {
            $this->flashMessenger()
                ->addMessage(
                    sprintf("Data Type '%s' was deleted.", $row['name'])
                );
            $this->table->deleteDataType($id);
        }

        return $this->redirect()->toRoute('cpanel/development/data-type');
    }
}
