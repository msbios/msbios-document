<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Statistic;

/**
 * Class Module
 * @package Kubnete\Statistic
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
