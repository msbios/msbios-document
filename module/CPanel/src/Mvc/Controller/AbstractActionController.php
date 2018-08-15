<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\CPanel\Mvc\Controller;

use MSBios\CPanel\Mvc\Controller\AbstractActionController as DefaultAbstractActionController;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\Form\FormInterface;
use Zend\Http\PhpEnvironment\Request;
use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayObject;
use Zend\Stdlib\Parameters;
use Zend\View\Model\ViewModel;

/**
 * Class AbstractActionController
 * @package Kubnete\CPanel\Mvc\Controller
 */
class AbstractActionController extends DefaultAbstractActionController
{
    /** @var RecordRepositoryInterface */
    protected $resource;

    /** @var FormInterface */
    protected $form;

    /** @const DEFAULT_CURRENT_PAGE_NUMBER */
    const DEFAULT_CURRENT_PAGE_NUMBER = 1;

    /**
     * AbstractActionController constructor.
     * @param RecordRepositoryInterface $repository
     * @param FormInterface $form
     */
    public function __construct(RecordRepositoryInterface $repository, FormInterface $form)
    {
        $this->resource = $repository;
        $this->form = $form;
    }

    /**
     * @return string
     */
    protected function getMatchedRouteName() {
        return $this
            ->getEvent()
            ->getRouteMatch()
            ->getMatchedRouteName();
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
            'paginator' => $paginator,
            'matchedRouteName' => $this->getMatchedRouteName()
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
            $row = static::factory();
            $this->form->setInputFilter($row->getInputFilter());

            /** @var Parameters $data */
            $data = $this->params()->fromPost();
            $this->form->setData($data);

            if ($this->form->isValid()) {

                /** @var array $values */
                $values = $this->form->getData();
                $row->exchangeArray($values);

                // fire event
                $this->getEventManager()->trigger(
                    self::EVENT_PRE_PERSIST_DATA,
                    $this,
                    ['row' => $row, 'data' => $data, 'values' => $values]
                );

                $this->resource->save($row);

                $this
                    ->flashMessenger()
                    ->addSuccessMessage("Row '{$row['name']}' was added.");

                return $this
                    ->redirect()
                    ->toRoute($matchedRouteName);
            } else {

                // fire event
                $this->getEventManager()->trigger(
                    self::EVENT_VALIDATE_ERROR,
                    $this,
                    ['row' => $row, 'data' => $data]
                );
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
            $this->flashMessenger()
                ->addInfoMessage($ex->getMessage());

            return $this->redirect()
                ->toRoute($matchedRouteName);
        }

        $this->form->setAttribute('action',
            $this->url()->fromRoute($matchedRouteName, [
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
                $this->resource->save($row);
                $this->flashMessenger()
                    ->addSuccessMessage("Row '{$row['name']}' has been edited.");

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
    public function dropAction()
    {
        /** @var string $id */
        $id = $this->params()->fromRoute('id');

        if ($row = $this->resource->fetch($id)) {
            $this->flashMessenger()
                ->addSuccessMessage("Row '{$row['name']}' was deleted.");
            $this->resource->delete($id);
        }

        return $this
            ->redirect()
            ->toRoute($this->getMatchedRouteName());
    }
}