<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Document\Statistic;

/**
 * Class Module
 * @package MSBios\Document\Statistic
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
