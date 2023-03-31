<?php

namespace Rhaym\Rssphpbrasil\Traits;

trait ClearXmlArray
{

    /**
     * this method get xml brute gazeta and get the main 
     * parts to send to destinantion
     * @param array $financialArray
     * @return array
     */
    function financialArrayGazetaDoPovo(array $financialArray): array
    {
        (array) $newArray = [];
        if (isset($financialArray['channel']) && count($financialArray['channel']['item']) > 0) {
            foreach ($financialArray['channel']['item'] as $new) {
                array_push($newArray, [
                    'url' => $new['link'],
                    'title' => $new['title'],
                    'description' => $new['description'],
                    'image' => $new['image'],
                ]);
            }
        }
        return $newArray;
    }

    /**
     * this method get xml brute r7 and get the main 
     * parts to send to destinantion
     * @param array $financialArray
     * @return array
     */
    function financialArrayR7(array $financialArray): array
    {
        (array) $newArray = [];
        if (isset($financialArray['entry']) && count($financialArray['entry']) > 0) {
            foreach ($financialArray['entry'] as $new) {
                array_push($newArray, [
                    'url' => $new['url'],
                    'title' => $new['title'],
                    'description' => $new['description'],
                    'image' => $new['mediaurl'],
                ]);
            }
        }
        return $newArray;
    }
}
