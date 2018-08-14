<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Development\Controller;

use Kubnete\CPanel\Mvc\Controller\AbstractActionController;
use Kubnete\Development\Form\TemplateForm;
use Kubnete\Resource\Record\Template;
use Kubnete\Resource\Table\TemplateTableGateway;
use Zend\Http\PhpEnvironment\Request;
use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayObject;
use Zend\View\Model\ViewModel;

/**
 * Class TemplateController
 * @package Kubnete\Development\Controller
 */
class TemplateController extends AbstractActionController
{
    /** @var TemplateTableGateway */
    protected $resource;

    /** @var TemplateForm */
    protected $form;

    /** @const DEFAULT_CURRENT_PAGE_NUMBER */
    const DEFAULT_CURRENT_PAGE_NUMBER = 1;

    /**
     * TemplateController constructor.
     * @param TemplateTableGateway $resource
     * @param TemplateForm $form
     */
    public function __construct(TemplateTableGateway $resource, TemplateForm $form)
    {
        $this->resource = $resource;
        $this->form = $form;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        /** @var Paginator $paginator */
        $paginator = $this->resource->fetchAll();

        $paginator->setItemCountPerPage(
            (int)$this->params()->fromQuery('limit', self::DEFAULT_ITEM_COUNT_PER_PAGE)
        );

        $paginator->setCurrentPageNumber(
            (int)$this->params()->fromQuery('page', self::DEFAULT_CURRENT_PAGE_NUMBER)
        );

        return new ViewModel([
            'paginator' => $paginator
        ]);
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function addAction()
    {
        /** @var string $matchedRouteName */
        $matchedRouteName = $this->getMatchedRouteName();

        $this->form->setAttribute(
            'action', $this->url()->fromRoute($matchedRouteName, ['action' => 'add'])
        );

        if ($this->getRequest()->isPost()) {

            /** @var ArrayObject $row */
            $row = self::factory();
            $this->form->setInputFilter($row->getInputFilter());
            $this->form->setData($this->params()->fromPost());

            if ($this->form->isValid()) {
                $row->exchangeArray($this->form->getData());
                $this->resource->save($row);

                $this
                    ->flashMessenger()
                    ->addMessage("Template '{$row['name']}' was added.");
                return $this
                    ->redirect()
                    ->toRoute($matchedRouteName);
            }
        }

        return new ViewModel([
            'form' => $this->form,
            'matchedRouteName' => $matchedRouteName
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

        /** @var string $matchedRouteName */
        $matchedRouteName = $this->getMatchedRouteName();

        if (!$id) {
            return $this->redirect()
                ->toRoute($matchedRouteName, ['action' => 'add']);
        }

        try {
            /** @var ArrayObject $row */
            $row = $this->resource->fetch($id);
        } catch (\Exception $ex) {
            return $this->redirect()
                ->toRoute($matchedRouteName);
        }

        $this->form->setAttribute('action',
            $this->url()->fromRoute($matchedRouteName, [
                'id' => $row['id']
            ])
        );

        // $this->bindContent($row);
        $this->form->bind($row);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter($row->getInputFilter());
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $row->exchangeArray($this->form->getData());
                // $this->bindContent($row);
                $this->resource->save($row);

                $this->flashMessenger()
                    ->addMessage("Template '{$row['name']}' has been edited.");

                return $this->redirect()
                    ->toRoute($matchedRouteName);
            }
        }

        return new ViewModel([
            'form' => $this->form,
            'matchedRouteName' => $matchedRouteName
        ]);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function deleteAction()
    {
        /** @var string $id */
        $id = $this->params()->fromRoute('id');

        if ($row = $this->resource->fetch($id)) {
            $this->flashMessenger()
                ->addMessage("Template '{$row['name']}' was deleted.");
            $this->resource->delete($id);
        }

        return $this
            ->redirect()
            ->toRoute($this->getMatchedRouteName());
    }

    /**
     * @return Template
     */
    protected static function factory()
    {
        return new Template;
    }

//
//    /**
//     * @param Template $template
//     * @param bool $write
//     */
//    private function bindContent(Template $template, $write = true)
//    {
//        /** @var string $filename */
//        $filename = sprintf(
//            './data/KubneteCMS/templates/%s.phtml',
//            $template['identifier']
//        );
//
//        if (! $write) {
//            unset($filename);
//            return;
//        }
//
//        if (empty($template['content'])) {
//            $template['content'] = file_get_contents($filename);
//            return;
//        }
//
//        file_put_contents($filename, $template['content']);
//    }
}
