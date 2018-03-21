<?php

use Page\Api\SuggestRequest;

class testSuggestRequestCest
{
    public function SuggestRequestTest(\ApiTester $I)
    {
        $suggestRequest = new \Page\Api\SuggestRequest($I);
        $suggestRequest->checkSuggest();
    }
}


