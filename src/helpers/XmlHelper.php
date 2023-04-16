<?php

namespace Rhaym\Rssphpbrasil\Helpers;

use SimpleXMLElement;

final class XmlHelper
{
    public function decodeXml($xml): array
    {
        $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        return $array;
    }

    public function decodeXmlWithMediacontent($xml): array
    {
        $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $mediasContent = [];
        foreach ($xml->channel->item as $item) {
            $content = $item->children('media', true)->content;
            $contentattr = $content->attributes();
            $contentattr = json_encode($contentattr);
            $contentattr = json_decode($contentattr, TRUE);
            $mediasContent[] = $contentattr['@attributes']['url'];
        }
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);

        return [$array, $mediasContent];
    }
}
