<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Storage;

use Zend\Session\Container as SessionContainer;
use Zend\Session\SessionManager;
use Zend\Stdlib\ArrayUtils;

/**
 * Class CartStorage
 * @package MSBios\Market\Doctrine\Storage
 */
class CartStorage implements CartStorageInterface
{
    /**
     * Default session namespace
     */
    const NAMESPACE_DEFAULT = __CLASS__;

    /**
     * Default session object member name
     */
    const MEMBER_DEFAULT = 'storage';

    /**
     * Object to proxy $_SESSION storage
     *
     * @var SessionContainer
     */
    protected $session;

    /**
     * Session namespace
     *
     * @var mixed
     */
    protected $namespace = self::NAMESPACE_DEFAULT;

    /**
     * Session object member
     *
     * @var mixed
     */
    protected $member = self::MEMBER_DEFAULT;

    /**
     * CartStorage constructor.
     * @param null $namespace
     * @param null $member
     * @param SessionManager|null $manager
     */
    public function __construct($namespace = null, $member = null, SessionManager $manager = null)
    {
        if ($namespace !== null) {
            $this->namespace = $namespace;
        }
        if ($member !== null) {
            $this->member = $member;
        }
        $this->session = new SessionContainer($this->namespace, $manager);
    }

    /**
     * @return mixed|null
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return mixed|null
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return !isset($this->session->{$this->member});
    }

    /**
     * @return mixed
     */
    public function read()
    {
        return $this->session->{$this->member};
    }

    /**
     * @param $contents
     */
    public function write($contents)
    {
        $this->session->{$this->member} = $contents;
    }

    /**
     *
     */
    public function clear()
    {
        unset($this->session->{$this->member});
    }
}