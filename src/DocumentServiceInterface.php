<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document;

/**
 * Interface DocumentServiceInterface
 * @package MSBios\Document
 */
interface DocumentServiceInterface
{
    /**
     * @return mixed
     */
    public function hasDocument();

    /**
     * @return mixed
     */
    public function getVariables();
}