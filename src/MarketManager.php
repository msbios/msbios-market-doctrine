<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

/**
 * Class MarketManager
 * @package MSBios\Market\Doctrine
 */
class MarketManager
{
    /** @var CartService */
    protected $cardService;

    /**
     * MarketManager constructor.
     *
     * @param CartService $cardService
     */
    public function __construct(CartService $cardService)
    {
        $this->cardService = $cardService;
    }

    /**
     * @return CartService
     */
    public function card()
    {
        return $this->cardService;
    }
}
