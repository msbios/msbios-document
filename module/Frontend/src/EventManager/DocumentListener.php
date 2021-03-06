<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Frontend\EventManager;

use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Table\DocumentTableGateway;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DocumentListener
 * @package MSBios\Document\Frontend\EventManager
 */
class DocumentListener extends AbstractListenerAggregate
{
    /**
     * Attach one or more listeners
     *
     * Implementors may add an optional $priority argument; the EventManager
     * implementation will pass this to the aggregate.
     *
     * @param EventManagerInterface $events
     * @param int $priority
     * @return void
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_ROUTE,
            [$this, 'onRoute']
        );
    }

    /**
     * @param EventInterface $event
     */
    public function onRoute(MvcEvent $event)
    {
        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $event->getApplication()
            ->getServiceManager();

        /** @var DocumentTableGateway $table */
        $table = $serviceManager->get(DocumentTableGateway::class);

        /** @var string $path */
        $path = ltrim($event->getRouteMatch()
            ->getParam('path'), '/');

        /** @var Document $document */
        $document = null;

        if (! empty($path)) {

            /** @var array $explodePath */
            $explodePath = $this->explodePath($path);

            /** @var null $parentUriKey */
            $parentUriKey = null;

            /** @var string $uriKey */
            foreach ($explodePath as $uriKey) {
                /** @var Document $document */
                $document = $table->fetchOneByUriAndAncestor($uriKey, $parentUriKey);
                $parentUriKey = $uriKey;
            }
        } else {

            /** @var Document $document */
            $document = $table->fetchOneByUriAndAncestor('');
        }

        $serviceManager->setService(
            Document::class,
            (empty($document)) ? false : $document
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
