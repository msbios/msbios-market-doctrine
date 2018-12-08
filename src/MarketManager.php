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
    /** @var CardService */
    protected $cardService;

    /**
     * MarketManager constructor.
     *
     * @param CardService $cardService
     */
    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    /**
     * @return CardService
     */
    public function card()
    {
        return $this->cardService;
    }
}
