<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Config;

/**
 * Class Module
 * @package Kubnete\Config
 */
class Module
{
    const VERSION = '0.0.1dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
