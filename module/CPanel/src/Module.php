<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Document\CPanel;

/**
 * Class Module
 * @package MSBios\Document\CPanel
 */
class Module
{
    /** @const VERSION */
    const VERSION = '0.0.1dev';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
