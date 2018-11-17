<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Document\Config;

/**
 * Class Module
 * @package MSBios\Document\Config
 */
class Module
{
    const VERSION = '0.0.1dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
