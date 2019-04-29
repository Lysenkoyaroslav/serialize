<?php

namespace itea\serializer;


use SerializerInterface\SerializerInterface;

class SerializeXml implements SerializerInterface
{
    /**
     * @param object $value
     *
     * @return string
     */
    public function serialize($value)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><data></data>');
        $this->arrayToXml($value, $xml);
        return $xml->asXML();
    }


    /**
     * @param $value
     *
     * @return array
     */
    public function unserialize($value)
    {
        $array = (array)\simplexml_load_string($value);
        $this->castToArray($array);
        return $array;
    }

    /**
     * Converts an array to XML.
     *
     * @param array $data
     * @param \SimpleXMLElement $xmlData
     */
    private function arrayToXml(array &$data, \SimpleXMLElement $xmlData)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $add_child = $xmlData->addChild($key);
                $this->arrayToXml($value, $add_child);
            } else {
                $xmlData->addChild($key, $value);
            }
        }
    }


    private function castToArray(array &$array)
    {
        foreach ($array as &$value) {
            if ($value instanceof \SimpleXMLElement) {
                $value = (array)$value;
            }
            if (is_array($value)) {
                $this->castToArray($value);
            }
        }
    }
}