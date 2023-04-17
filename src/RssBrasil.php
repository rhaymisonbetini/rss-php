<?php

namespace Rhaym\Rssphpbrasil;

use Rhaym\Rssphpbrasil\Services\RssInternationalService;
use Rhaym\Rssphpbrasil\Services\RssService;

class RssBrasil
{
    /**
     * Instance of rssService for 
     * get And acess any manys endpoints
     */
    private $rssService;

    /**
     * Instance of rssInternationalService for 
     * get And acess any manys endpoints of international news
     */
    private $rssInternationalService;

    /**
     * this constructor create a instance o rssService to 
     * call Guzzle and realize all gets int rss endpoints
     */
    public function __construct()
    {
        $this->rssService = new RssService();
        $this->rssInternationalService = new RssInternationalService();
    }

    /**
     * This method generate a All Rss array
     * @return array
     */
    function getRss(): array
    {
        return [
            'financial' => $this->getFinancialRss(),
            'entretain' => $this->getEntretainRss(),
            'politics' => $this->getPolitcRss(),
            'sports' => $this->getSportsRss(),
            'tec' => $this->getTecRss(),
            'world' => $this->getWorldRss(),
            'general' => $this->getGeneralRss(),
            'eua' => $this->unitedStates(),
            'europe' => $this->europe(),
        ];
    }

    /**
     * this method get a financialRSS in Brasil e return a array
     * @return array
     */
    public function getFinancialRss(): array
    {
        $finalncial = $this->rssService->getFinancialRss();
        return $finalncial;
    }


    /**
     * this method get a entretain in Brasil e return a array 
     * @return array
     */
    public function getEntretainRss(): array
    {
        $entretain = $this->rssService->getEntretainRss();
        return $entretain;
    }

    /**
     * this method get a politics in Brasil e return a array 
     * @return array
     */
    public function getPolitcRss(): array
    {
        $politics = $this->rssService->getPolitcRss();
        return $politics;
    }

    /**
     * this method get a sports in Brasil e return a array 
     * @return array
     */
    public function getSportsRss(): array
    {
        $sports = $this->rssService->getSportsRss();
        return $sports;
    }

    /**
     * this method get a tec in Brasil e return a array 
     * @return array
     */
    public function getTecRss(): array
    {
        $tec = $this->rssService->getTecRss();
        return $tec;
    }

    /**
     * this method get a world news in PT Brasil e return a array 
     * @return array
     */
    public function getWorldRss(): array
    {
        $world = $this->rssService->getWorldRss();
        return $world;
    }


    /**
     * this method get a world news in PT Brasil e return a array 
     * @return array
     */
    public function getGeneralRss(): array
    {
        $general = $this->rssService->getGeneralRss();
        return $general;
    }

    /**
     * this method get a iternational (EUA) news (EN) e returna a array
     * @return array
     */
    public function unitedStates(): array
    {
        $us = $this->rssInternationalService->unitedStates();
        return $us;
    }

    /**
     * this method get a iternation (europe) news (EN) e returna a array
     * @return array
     */
    public function europe(): array
    {
        $europe = $this->rssInternationalService->europe();
        return $europe;
    }
}
