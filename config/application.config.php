<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
return [
    // Retrieve list of modules used in this application.
    'modules' => [
        'Zend\Hydrator',
        'Zend\Filter',
        'Zend\Validator',
        'Zend\Session',
        'Zend\Paginator',
        'Zend\Cache',
        'Zend\Serializer',
        'Zend\Db',
        'Zend\InputFilter',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Navigation',
        'Zend\Router',
        'Zend\Form',
        'Zend\I18n',

        'MSBios\Validator',
        'MSBios\Cache',
        'MSBios\Hydrator',
        'MSBios\Db',
        'MSBios\I18n',
        'MSBios\Assetic',
        'MSBios\Widget',
        'MSBios\Theme',
        'MSBios\Navigation',
        'MSBios\Application',
        'MSBios\Paginator\Doctrine',
        'MSBios\View',

        'DoctrineModule',
        'DoctrineORMModule',

        'MSBios\Doctrine',
        'MSBios\Form',
        'MSBios\Form\Doctrine',
        'MSBios\Resource',
        'MSBios\Resource\Doctrine',
        'MSBios\Authentication',
        'MSBios\Authentication\Doctrine',
        'MSBios\CPanel',
        'MSBios\CPanel\Doctrine',
        'MSBios\Guard',
        'MSBios\Guard\Doctrine',
        'MSBios\Guard\CPanel',
        'MSBios\Guard\CPanel\Doctrine',
        'MSBios\Guard\Resource',
        'MSBios\Guard\Resource\Doctrine',

        'MSBios\Guard\DeveloperTools',
        'MSBios\Test',
        'ZendDeveloperTools',

        'MSBios\Market\Doctrine',
        'MSBios\Market\CPanel\Doctrine',
        'MSBios\Market\Resource\Doctrine',
    ],
    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths' => [
            './module',
            './vendor',
        ],
        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        'config_cache_enabled' => false,
        // The key used to create the configuration cache file name.
        'config_cache_key' => 'application.config.cache',
        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        'module_map_cache_enabled' => false,
        // The key used to create the class map cache file name.
        'module_map_cache_key' => 'application.module.cache',
        // The path in which to cache merged configuration.
        'cache_dir' => 'data/cache/',
        // Whether or not to enable modules dependency checking.
        // Enabled by default, prevents usage of modules that depend on other modules
        // that weren't loaded.
        // 'check_dependencies' => true,
    ],
    // Used to create an own service manager. May contain one or more child arrays.
    // 'service_listener_options' => [
    //     [
    //         'service_manager' => $stringServiceManagerName,
    //         'config_key'      => $stringConfigKey,
    //         'interface'       => $stringOptionalInterface,
    //         'method'          => $stringRequiredMethodName,
    //     ],
    // ],
    // Initial configuration with which to seed the ServiceManager.
    // Should be compatible with Zend\ServiceManager\Config.
    // 'service_manager' => [],
];
