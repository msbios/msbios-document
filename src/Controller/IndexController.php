<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Controller;

use MSBios\Application\Controller\IndexController as DefaultIndexController;
use MSBios\Document\DocumentService;
use MSBios\Document\DocumentServiceInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ModelInterface;

/**
 * Class IndexController
 * @package MSBios\Document\Controller
 */
class IndexController extends DefaultIndexController
{
    /** @const EVENT_DOCUMENT */
    const EVENT_DOCUMENT = 'document';

    /** @const EVENT_POST_DOCUMENT */
    const EVENT_POST_DOCUMENT = 'post.document';

    /** @var  DocumentService|DocumentServiceInterface */
    protected $documentService;

    /**
     * IndexController constructor.
     * @param DocumentServiceInterface $documentService
     */
    public function __construct(DocumentServiceInterface $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();

        /** @var EventManagerInterface $eventManager */
        $eventManager = $this->getEventManager();
        $eventManager->trigger(self::EVENT_DOCUMENT, $this, [
            'viewModel' => $viewModel
        ]);

        if (!$this->documentService->hasDocument()) {
            return $this->notFoundAction();
        }



        return $viewModel;
    }

}
