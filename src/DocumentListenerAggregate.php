<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document;

use MSBios\Document\Resource\Record\Document;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DocumentListenerAggregate
 * @package MSBios\Document
 */
class DocumentListenerAggregate extends AbstractListenerAggregate
{
    /** @var RecordRepositoryInterface */
    protected $repository;

    /**
     * DocumentListenerAggregate constructor.
     * @param RecordRepositoryInterface $repository
     */
    public function __construct(RecordRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     *
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_ROUTE,
            [$this, 'onRoute'], $priority
        );
    }

    /**
     * @param EventInterface $e
     */
    public function onRoute(EventInterface $e)
    {
        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $e->getApplication()
            ->getServiceManager();

        /** @var string $path */
        $path = ltrim($e->getRouteMatch()->getParam('path'), '/');

        /** @var Document $document */
        $document = null;

        if (!empty($path)) {

            /** @var array $explodePath */
            $explodePath = $this->explodePath($path);

            /** @var null $parentUriKey */
            $parentUriKey = null;

            /** @var string $uriKey */
            foreach ($explodePath as $uriKey) {

                /** @var Document $document */
                $document = $this->repository
                    ->fetchOneByUriAndAncestor($uriKey, $parentUriKey);

                $parentUriKey = $uriKey;
            }
        } else {
            /** @var Document $document */
            $document = $this->repository->fetchOneByUriAndAncestor('');
        }

        $serviceManager->setService(
            DocumentService::class,
            new DocumentService($serviceManager, $document ? $document : null)
        );
    }

    /**
     * Explode path
     *
     * @param string $path Url path
     * @return array
     */
    protected function explodePath($path)
    {
        $explodePath = explode('/', $path);
        if (preg_match('/\/$/', $path)) {
            array_pop($explodePath);
        }

        return $explodePath;
    }
}
