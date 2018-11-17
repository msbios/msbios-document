<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\CPanel\Controller;

use MSBios\Document\CPanel\Mvc\Controller\AbstractActionController;
use MSBios\Document\Resource\Record\Template;
use MSBios\Resource\RecordInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class TemplateController
 * @package MSBios\Document\CPanel\Controller
 */
class TemplateController extends AbstractActionController
{
    /**
     * @param MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        /** @var EventManagerInterface $eventManager */
        $eventManager = $e->getTarget()
            ->getEventManager();
        $eventManager->attach(self::EVENT_POST_PERSIST_DATA, [$this, 'onPostPersistOrMergeData']);
        $eventManager->attach(self::EVENT_POST_MERGE_DATA, [$this, 'onPostPersistOrMergeData']);
        return parent::onDispatch($e);
    }

    /**
     * @param EventInterface $e
     */
    public function onPostPersistOrMergeData(EventInterface $e)
    {
        /** @var RecordInterface $row */
        $row = $e->getParam('row');

        /** @var string $filename */
        $filename = './data/MSBiosDocument/cache';

        if (is_dir(! $filename)) {
            mkdir($filename, 0777, true);
        }

        $filename .= sprintf(
            '/%s.phtml',
            $row['identifier']
        );

        file_put_contents($filename, $row['code']);
    }

    /**
     * @return Template
     */
    protected static function factory()
    {
        return new Template;
    }
}
