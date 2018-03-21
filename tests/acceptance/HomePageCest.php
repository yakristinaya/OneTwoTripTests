<?php

use Page\Acceptance\HomePage;

class HomePageCest
{

    public function checkRedirectTest(AcceptanceTester $I)
    {
        $page = new \Page\Acceptance\HomePage($I);
        $page->checkRedirect();
    }
}
