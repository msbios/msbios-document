<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Document\DataType;

/**
 * Class Module
 * @package MSBios\Document\DataType
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
