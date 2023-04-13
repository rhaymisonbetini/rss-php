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

    /**
     * this method get xml brute globo  and get the main 
     * parts to send to destinantion
     * @param array $financialArray
     * @return array
     */
    public function globoEntretainClear(array $globoEntretain): array
    {
        (array) $newArray = [];
        if (isset($globoEntretain['channel']) && count($globoEntretain['channel']['item']) > 0) {
            foreach ($globoEntretain['channel']['item'] as $new) {
                $imgDesc = $this->getImgInsideString($new['description']);
                array_push($newArray, [
                    'url' => $new['link'],
                    'title' => $new['title'],
                    'description' => $imgDesc[1],
                    'image' => $imgDesc[0],
                ]);
            }
        }
        return $newArray;
    }

    public function gazetaDoPovoEntretain(array $gazetaEntretain):array
    {
        
        (array) $newArray = [];
        if (isset($gazetaEntretain['channel']) && count($gazetaEntretain['channel']['item']) > 0) {
            foreach ($gazetaEntretain['channel']['item'] as $new) {
                array_push($newArray, [
                    'url' => $new['link'],
                    'title' => $new['title'],
                    'description' => $this->clearDescriptionGazeta($new['description']),
                    'image' => $new['image']['url'],
                ]);
            }
        }
        return $newArray;
    }

    /**
     * This methodo clean a img description of globo, cause (i dont know) they 
     * return a img tag inside a description tag..????????
     * The best way to provider this clean in front is that (at this moment)
     * @param string $descrption;
     * @retrn array
     */
    public function getImgInsideString(string $descrption): array
    {
        $imgFinder = explode("<br />", $descrption);
        $img = trim(str_replace('/>', '', str_replace('"', '', explode("src=", explode("<br />", $imgFinder[0])[0])[1])));
        $descrption = trim($imgFinder[1]);
        return [
            $img,
            $descrption
        ];
    }

    public function clearDescriptionGazeta($descrption)
    {
        $descrption = explode("<br />", $descrption);
        return $descrption[1] ?? '';
    }
}
