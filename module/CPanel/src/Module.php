<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\CPanel\Doctrine;

/**
 * Class Module
 * @package MSBios\Market\CPanel\Doctrine
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
