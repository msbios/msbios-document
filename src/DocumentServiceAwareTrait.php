<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document;

/**
 * Trait DocumentServiceAwareTrait
 * @package MSBios\Document
 */
trait DocumentServiceAwareTrait
{
    /** @var DocumentServiceInterface */
    protected $documentService;

    /**
     * @return DocumentServiceInterface
     */
    public function getDocumentService(): DocumentServiceInterface
    {
        return $this->documentService;
    }

    /**
     * @param DocumentServiceInterface $documentService
     * @return $this
     */
    public function setDocumentService(DocumentServiceInterface $documentService)
    {
        $this->documentService = $documentService;
        return $this;
    }
}