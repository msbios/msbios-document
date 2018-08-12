<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace KubneteTest\Resource;

use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

/**
 * Class ModuleTest
 * @package KubneteTest\Resource
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        /** @var array $applicationConfig */
        $applicationConfig = ArrayUtils::merge(
            include __DIR__ . '/../../../config/application.config.php',
            $configOverrides
        );

        // do not cache module config on testing environment
        if (isset($applicationConfig['module_listener_options']['config_cache_enabled'])) {
            $applicationConfig['module_listener_options']['config_cache_enabled'] = false;
        }

        return $applicationConfig;
    }

    /**
     * Scans service manager configuration, returning all services created by factories and invokables
     * @return array
     */
    public function provideServiceListOfModule()
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';

        /** @var array $serviceManager */
        $serviceManager = $config['service_manager'];

        /** @var array $serviceConfig */
        $serviceConfig = array_merge(
            isset($serviceManager['factories']) ? $serviceManager['factories'] : [],
            isset($serviceManager['invokables']) ? $serviceManager['invokables'] : []
        );

        /** @var array $services */
        $services = [];

        foreach ($serviceConfig as $key => $val) {
            $services[] = [$key];
        }

        return $services;
    }

    /**
     * @dataProvider provideServiceListOfModule
     */
    public function testServicesModuleInitialized($service)
    {
        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = Application::init($this->setUp())->getServiceManager();

        // test if service is available in SM
        $this->assertTrue($serviceManager->has($service));

        // test if correct instance is created
        $this->assertInstanceOf($service, $serviceManager->get($service));
    }
}
