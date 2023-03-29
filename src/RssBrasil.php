<?php

namespace Rhaym\Rssphpbrasil;

use Rhaym\Rssphpbrasil\Services\RssService;

class RssBrasil
{

    private $rssService;

    public function __construct(){
        $this->rssService = new RssService();
    }

    public function getRss()
    {
        $teste = $this->rssService->getFinancialRss();
        print_r($teste);
    }
}
