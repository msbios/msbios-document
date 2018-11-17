<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Controller;

use MSBios\Application\Controller\IndexController as DefaultIndexController;
use MSBios\Document\DocumentServiceAwareInterface;
use MSBios\Document\DocumentServiceAwareTrait;
use MSBios\Document\DocumentServiceInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ModelInterface;

/**
 * Class IndexController
 * @package MSBios\Document\Controller
 */
class IndexController extends DefaultIndexController implements DocumentServiceAwareInterface
{
    use DocumentServiceAwareTrait;

    /** @const EVENT_DOCUMENT */
    const EVENT_DOCUMENT = 'document';

    /** @const EVENT_POST_DOCUMENT */
    const EVENT_POST_DOCUMENT = 'post.document';

    /**
     * IndexController constructor.
     * @param DocumentServiceInterface $documentService
     */
    public function __construct(DocumentServiceInterface $documentService)
    {
        $this->setDocumentService($documentService);
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

        /** @var DocumentServiceInterface $documentService */
        $documentService = $this->getDocumentService();

        if (! $documentService->hasDocument()) {
            return $this->notFoundAction();
        }

        if (! $documentService->hasLayout() || $this->getRequest()->isXmlHttpRequest()) {
            $viewModel
                ->setTerminal(true);
        } elseif ($documentService->hasLayout()) {
            $this
                ->layout()
                ->setTemplate($documentService->getLayout())
                ->setVariables($documentService->getVariables());
        }

        $viewModel
            ->setTemplate($documentService->getView())
            ->setVariables($documentService->getVariables());

        return $viewModel;
    }
}
