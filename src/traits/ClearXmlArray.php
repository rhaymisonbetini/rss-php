<?php

namespace Rhaym\Rssphpbrasil\Traits;

trait ClearXmlArray
{

      /**
     * this method get xml brute gazeta do povo  and get the main 
     * parts to send to destinantion
     * @param array $gazetaEntretain
     * @return array
     */
    public function gazetaDoPovoGeneral(array $gazetaEntretain): array
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
     * this method get xml brute r7 and get the main 
     * parts to send to destinantion
     * @param array $financialArray
     * @return array
     */
    function r7GeneralClear(array $financialArray): array
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
     * @param array $globoEntretain
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


    /**
     * this method get xml brute el pais and get the main 
     * parts to send to destinantion
     * @param array $politc
     * @return array
     */
    public function elPaisPolitcClear(array $politc): array
    {
        (array) $newArray = [];
        if (isset($politc['channel']) && count($politc['channel']['item']) > 0) {
            foreach ($politc['channel']['item'] as $new) {
                array_push($newArray, [
                    'url' => $new['link'],
                    'title' => $new['title'],
                    'description' => $new['description'],
                    'image' => '',
                ]);
            }
        }
        return $newArray;
    }

    
    /**
     * this method get xml brute g1 and get the main 
     * parts to send to destinantion
     * @param array $politc
     * @return array
     */
    public function g1Generalclear(array $politc): array
    {
        (array) $newArray = [];
        if (isset($politc['channel']) && count($politc['channel']['item']) > 0) {
            foreach ($politc['channel']['item'] as $new) {
                if (strpos($new['description'], 'src=')) {
                    $imgDesc = $this->getImgInsideString($new['description']);
                } else {
                    $imgDesc[0] = null;
                    $imgDesc[1] =  $new['description'];
                }
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

    
    /**
     * this method get xml brute tecmundo and get the main 
     * parts to send to destinantion
     * @param array $tec
     * @return array
     */
    public function tecmundoClear(array $tecBrasil): array
    {
        (array) $newArray = [];
        if (isset($tecBrasil['channel']) && count($tecBrasil['channel']['item']) > 0) {
            foreach ($tecBrasil['channel']['item'] as $new) {
                array_push($newArray, [
                    'url' => $new['link'],
                    'title' => $new['title'],
                    'description' => strip_tags($new['description']),
                    'image' => $new['enclosure']['@attributes']['url'] ?? '',
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
