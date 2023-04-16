<?php

namespace Rhaym\Rssphpbrasil\Traits;

trait ClearXmlInternational
{
    /**
     * this method get xml brute euaNews  and get the main 
     * parts to send to destinantion
     * @param array $euaNews
     * @return array
     */
    public function euaNews(array $euaNews, array $medias): array
    {

        (array) $newArray = [];
        if (isset($euaNews['channel']) && count($euaNews['channel']['item']) > 0) {
            foreach ($euaNews['channel']['item'] as $key => $value) {
                array_push($newArray, [
                    'url' => $value['link'],
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'image' => $medias[$key],
                ]);
            }
        }
        return $newArray;
    }


    public function europeNews(array $europe)
    {
        (array) $newArray = [];
        if (isset($europe['channel']) && count($europe['channel']['item']) > 0) {
            foreach ($europe['channel']['item'] as $key => $value) {
                array_push($newArray, [
                    'url' => $value['link'],
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'image' => $value['enclosure']['@attributes']['url'] ?? null,
                ]);
            }
        }
        return $newArray;
    }
}
