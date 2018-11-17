<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\DocumentTest\Content\Controller;

use MSBios\Document\Content\Controller\DocumentController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class DocumentControllerTest
 * @package MSBios\DocumentTest\Content\Controller
 */
class DocumentControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Constructor
     */
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/admin/content/document', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName(DocumentController::class); // as specified in router's controller name alias
        $this->assertControllerClass('DocumentController');
        $this->assertMatchedRouteName('backend/content/document');
    }

//    public function testIndexActionCanBeAccessedBlogDocument()
//    {
//        $this->dispatch('/blogs', 'GET');
//        $this->assertResponseStatusCode(200);
//        $this->assertControllerName(IndexController::class); // as specified in router's controller name alias
//        $this->assertControllerClass('IndexController');
//        $this->assertMatchedRouteName('frontend');
//    }
//
//    public function testInvalidRouteDoesNotCrash()
//    {
//        $this->dispatch('/invalid/route', 'GET');
//        $this->assertResponseStatusCode(404);
//    }
}
