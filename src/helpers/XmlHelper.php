<?php

namespace Rhaym\Rssphpbrasil\Helpers;

final class XmlHelper
{
    public function decodeXml($xml)
    {
        $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        return $array;
    }
}
