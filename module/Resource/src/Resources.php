<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource;

use MSBios\Stdlib\Enum;

/**
 * Class Resources
 * @package MSBios\Document\Resource
 */
abstract class Resources extends Enum
{
    /** @const CNT_T_DOCUMENTS */
    const CNT_T_DOCUMENTS = 'cnt_t_documents';

    /** @const DOC_T_PROPERTIES */
    const DOC_T_PROPERTIES = 'doc_t_properties';

    /** @const DOC_T_PROPERTY_VALUES */
    const DOC_T_PROPERTY_VALUES = 'doc_t_property_values';

    /** @const SYS_T_DATATYPES */
    const SYS_T_DATATYPES = 'sys_t_datatypes';

    /** @const SYS_T_TEMPLATES */
    const SYS_T_TEMPLATES = 'sys_t_templates';

    /** @const DEV_T_DOCUMENT_TYPES */
    const DEV_T_DOCUMENT_TYPES = 'dev_t_document_types';
}
