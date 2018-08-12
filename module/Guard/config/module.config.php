<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Guard;

return [
    Module::class => [

        /**
         * default role for unauthenticated users
         */
        'default_role' => 'GUEST',

        /**
         * default role for authenticated users (if using the
         * 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider' identity provider)
         */
        'authenticated_role' => 'USER',

        /**
         * identity provider service name
         */
        'identity_provider' => 'BjyAuthorize\Provider\Identity\ZfcUserZendDb',

        /**
         * Role providers to be used to load all available roles into Zend\Permissions\Acl\Acl
         * Keys are the provider service names, values are the options to be passed to the provider
         */
        'role_providers' => [],

        /**
         * Resource providers to be used to load all available resources into Zend\Permissions\Acl\Acl
         * Keys are the provider service names, values are the options to be passed to the provider
         */
        'resource_providers' => [],

        /**
         * Rule providers to be used to load all available rules into Zend\Permissions\Acl\Acl
         * Keys are the provider service names, values are the options to be passed to the provider
         */
        'rule_providers' => [],

        /**
         * Guard listeners to be attached to the application event manager
         */
        'guards' => [],

        /**
         * strategy service name for the strategy listener to be used when permission-related errors are detected
         */
        'unauthorized_strategy' => 'BjyAuthorize\View\UnauthorizedStrategy',

        /**
         * Template name for the unauthorized strategy
         */
        'template' => 'error/403',
    ]
];
