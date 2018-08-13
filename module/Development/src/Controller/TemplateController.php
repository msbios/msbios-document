<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Controller;

use Kubnete\Development\Form\TemplateForm;
use Kubnete\Resource\Record\Template;
use Kubnete\Resource\Table\TemplateTable;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class TemplateController
 * @package Kubnete\Development\Controller
 */
class TemplateController extends AbstractActionController
{
    /** @var TemplateTable */
    protected $table;

    /** @var TemplateForm */
    protected $form;

    /**
     * TemplateController constructor.
     * @param TemplateTable $table
     * @param TemplateForm $form
     */
    public function __construct(TemplateTable $table, TemplateForm $form)
    {
        $this->table = $table;
        $this->form = $form;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel([
            'templates' => $this->table->fetchAll(),
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
            $this->url()
                ->fromRoute('backend/development/template/add')
        );

        if ($this->getRequest()->isPost()) {

            /** @var Template $row */
            $row = new Template;
            $this->form->setInputFilter($row->getInputFilter());
            $this->form->setData($this->params()->fromPost());

            if ($this->form->isValid()) {
                $row->exchangeArray($this->form->getData());
                $this->bindContent($row);
                $this->table->save($row);

                $this->flashMessenger()
                    ->addMessage(
                        sprintf("Template '%s' was added.", $row['name'])
                    );
                return $this->redirect()
                    ->toRoute('backend/development/template');
            }
        }

        return new ViewModel([
            'form' => $this->form
        ]);
    }

    /**
     * @return ViewModel
     */
    public function editAction()
    {
        /** @var int $id */
        $id = (int)$this->params()
            ->fromRoute('id', 0);

        if (! $id) {
            return $this->redirect()
                ->toRoute('backend/development/template/add');
        }

        try {
            /** @var Template $row */
            $row = $this->table
                ->getTemplate($id);
        } catch (\Exception $ex) {
            return $this->redirect()
                ->toRoute('backend/development/template');
        }

        $this->form->setAttribute(
            'action',
            $this->url()->fromRoute('backend/development/template/edit', [
                'id' => $row['id']
            ])
        );

        $this->bindContent($row);
        $this->form->bind($row);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter($row->getInputFilter());
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $row->exchangeArray($this->form->getData());
                $this->bindContent($row);
                $this->table->save($row);

                $this->flashMessenger()
                    ->addMessage(
                        sprintf("Template '%s' has been edited.", $row['name'])
                    );
                return $this->redirect()
                    ->toRoute('backend/development/template');
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
        $id = $this->params()->fromRoute('id');

        if ($row = $this->table->getTemplate($id)) {
            $this->flashMessenger()
                ->addMessage(
                    sprintf("Template '%s' was deleted.", $row['name'])
                );

            $this->bindContent($row, false);
            $this->table->deleteTemplate($id);
        }

        return $this->redirect()->toRoute('backend/content/template');
    }

    /**
     * @param Template $template
     * @param bool $write
     */
    private function bindContent(Template $template, $write = true)
    {
        /** @var string $filename */
        $filename = sprintf(
            './data/KubneteCMS/templates/%s.phtml',
            $template['identifier']
        );

        if (! $write) {
            unset($filename);
            return;
        }

        if (empty($template['content'])) {
            $template['content'] = file_get_contents($filename);
            return;
        }

        file_put_contents($filename, $template['content']);
    }
}
