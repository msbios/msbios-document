<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Document\Module;

/**
 * Class Module
 * @package MSBios\Document\Module
 */
class Module
{
    const VERSION = '0.0.1dev';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
