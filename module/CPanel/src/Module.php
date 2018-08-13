<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\CPanel;

/**
 * Class Module
 * @package Kubnete\CPanel
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
