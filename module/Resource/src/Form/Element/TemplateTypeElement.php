<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Form\Element;

use Zend\Form\Element\Select;

/**
 * Class TemplateTypeElement
 * @package MSBios\Document\Resource\Form\Element
 */
class TemplateTypeElement extends Select
{
    /** @const VIEW */
    const VIEW = 'VIEW';

    /** @const LAYOUT */
    const LAYOUT = 'LAYOUT';

    /**
     * @var array
     */
    protected $valueOptions = [
        self::VIEW => 'View',
        self::LAYOUT => 'Layout'
    ];
}
