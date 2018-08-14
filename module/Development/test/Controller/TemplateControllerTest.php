<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace KubneteTest\Development\Controller;

use Kubnete\Development\Controller\TemplateController;
use Kubnete\Resource\Table\TemplateTableGateway;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class TemplateControllerTest
 * @package KubneteTest\Development\Controller
 */
class TemplateControllerTest extends AbstractHttpControllerTestCase
{

    protected $traceError = true;

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
        $this->dispatch('/admin/development/template', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName(TemplateController::class); // as specified in router's controller name alias
        $this->assertControllerClass('TemplateController');
        $this->assertMatchedRouteName('backend/development/template');
    }

    public function testAddActionCanBeAccessed()
    {
        $this->dispatch('/admin/development/template/add', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName(TemplateController::class); // as specified in router's controller name alias
        $this->assertControllerClass('TemplateController');
        $this->assertMatchedRouteName('backend/development/template/add');
    }

    public function testAddActionRedirectAfterValidPost()
    {
        /** @var TemplateTableGateway $templateTableMock */
        $templateTableMock = $this->getMockBuilder(TemplateTableGateway::class)
            ->disableOriginalConstructor()
            ->getMock();

        $templateTableMock->expects($this->once())
            ->method('save')
            ->will($this->returnValue(null));

        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService(TemplateTableGateway::class, $templateTableMock);

        /** @var array $postData */
        $postData = [
            'type' => 'VIEW',
            'identifier' => 'identifier-php-unit-test',
            'name' => 'Name PHP Unit test',
            'content' => 'Content PHP Unit test',
            'id' => '',
        ];

        $this->dispatch('/admin/development/template/add', 'POST', $postData);
        $this->assertResponseStatusCode(302);

        $this->assertRedirectTo('/admin/development/template/');
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
