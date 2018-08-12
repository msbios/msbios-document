<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\DataType;

/**
 * Class Module
 * @package Kubnete\DataType
 */
class Module
{
    const VERSION = '0.0.1dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
