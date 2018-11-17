<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
require __DIR__ . "/../../../vendor/autoload.php";

/** @var string $strPathname */
$strPathname = './data/cache/MSBios\DocumentTemplates';
if (! is_dir($strPathname)) {
    mkdir($strPathname, 0777, true);
}
