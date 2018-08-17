<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\CPanel\Mvc\Controller;

use MSBios\CPanel\Mvc\Controller\AbstractActionController as DefaultAbstractActionController;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Form\FormInterface;
use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayObject;
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
    protected function getMatchedRouteName()
    {
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

            /** @var array $argv */
            $argv = [];

            $argv['row'] = static::factory();
            $this->form
                ->setInputFilter($argv['row']->getInputFilter());

            $argv['data'] = $this->params()
                ->fromPost();
            $this->form
                ->setData($argv['data']);

            /** @var EventManagerInterface $eventManager */
            $eventManager = $this->getEventManager();

            if ($this->form->isValid()) {
                $argv['values'] = $this->form
                    ->getData();
                $argv['row']->exchangeArray($argv['values']);

                $eventManager
                    ->trigger(self::EVENT_PRE_PERSIST_DATA, $this, $argv);

                $this->resource
                    ->save($argv['row']);

                $eventManager
                    ->trigger(self::EVENT_POST_PERSIST_DATA, $this, $argv);

                $this->flashMessenger()
                    ->addSuccessMessage("Row '{$argv['row']['name']}' was added.");

                return $this->redirect()
                    ->toRoute($matchedRouteName);
            } else {
                $eventManager
                    ->trigger(self::EVENT_VALIDATE_ERROR, $this, $argv);
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

        $this->form->setAttribute('action', $this->url()->fromRoute($matchedRouteName, [
            'action' => 'edit',
            'id' => $row['id']
        ]));

        /** @var array $argv */
        $argv = ['row' => $row];

        /** @var EventManagerInterface $eventManager */
        $eventManager = $this->getEventManager();
        $eventManager->trigger(self::EVENT_PRE_BIND_DATA, $this, $argv);

         // r($row); die();

        // $this->form->bind($row);
        $this->form->setData($row);

        if ($this->getRequest()->isPost()) {
            $this->form->setInputFilter($row->getInputFilter());

            /** @var array $params */
            $data = $this->params()->fromPost();
            $this->form->setData($data);

            if ($this->form->isValid()) {

                /** @var array $values */
                $values = $this->form->getData();
                $row->exchangeArray($values);

                $eventManager->trigger(
                    self::EVENT_PRE_MERGE_DATA,
                    $this,
                    ['row' => $row, 'data' => $data, 'values' => $values]
                );

                $this->resource->save($row);

                $eventManager->trigger(
                    self::EVENT_POST_MERGE_DATA,
                    $this,
                    ['row' => $row, 'data' => $data, 'values' => $values]
                );

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

        /** @var ArrayObject $row */
        if ($row = $this->resource->fetch($id)) {
            $this->flashMessenger()
                ->addSuccessMessage("Row '{$row['name']}' was deleted.");

            /** @var EventManagerInterface $eventManager */
            $eventManager = $this->getEventManager();
            $eventManager->trigger(
                self::EVENT_PRE_REMOVE_DATA,
                $this,
                ['row' => $row]
            );

            $this->resource->delete($id);

            $eventManager->trigger(
                self::EVENT_POST_REMOVE_DATA,
                $this,
                ['row' => $row]
            );
        }

        return $this->redirect()
            ->toRoute($this->getMatchedRouteName());
    }
}
