<?php

namespace Page\Acceptance;

class HomePage
{
    public static $URL = 'https://www.onetwotrip.com/ru/#?deals_from=MOW&deals_to=ANYWHERE&deals_when=CHEAPEST&deals_stay=ANY_STAY';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function checkRedirect()
    {
        $I = $this->tester;

        $I->amOnUrl('https://onetwotrip.com');
        $I->seeFullUrlEquals(HomePage::$URL);

        return $this;
    }


}
