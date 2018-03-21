<?php

namespace Page\Api;

class SuggestRequest
{
    const BASE_URL = 'https://www.onetwotrip.com/_hotels/api/suggestRequest';
    const QUERIES = [
        '?query=%D0%9C%D0%BE%D1%81%D0%BA&limit=7&lang=ru&locale=ru&currency=RUB',
        '?query=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8&limit=7&lang=ru&locale=ru&currency=RUB'

    ];
    const ASSERTS = [
        ['id' => 'integer'],
        ['city_id' => 'integer'],
        ['timezone_gmt' => 'integer'],
        ['name' => 'string'],
        ['timezone' => 'string']
    ];

    protected $tester;

    public function __construct(\ApiTester $I)
    {
        $this->tester = $I;
    }

    public function checkSuggest()
    {

        $I = $this->tester;

        $I->wantTo('Проверить выдачу подсказкок');
        $I->haveHttpHeader('Content-Type', 'application/json');

        foreach (SuggestRequest::QUERIES as $query) {
            $url = SuggestRequest::BASE_URL . $query;
            $I->sendGET($url);
            $I->seeResponseCodeIs(200);
            $I->seeResponseMatchesJsonType(['error' => 'null'], '');

            foreach (SuggestRequest::ASSERTS as $assert) {
                $I->seeResponseMatchesJsonType($assert, 'result[0]');
            }
        }

        return $I;
    }

}
