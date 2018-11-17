<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document;

/**
 * Interface DocumentServiceAwareInterface
 * @package MSBios\Document
 */
interface DocumentServiceAwareInterface
{
    /**
     * @return DocumentServiceInterface
     */
    public function getDocumentService(): DocumentServiceInterface;

    /**
     * @param DocumentServiceInterface $documentService
     * @return mixed
     */
    public function setDocumentService(DocumentServiceInterface $documentService);
}
