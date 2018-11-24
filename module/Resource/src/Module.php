<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource;

/**
 * Class Module
 * @package MSBios\Document\Resource
 */
class Module
{
    /** @const VERSION */
    const VERSION = '0.0.1dev';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
