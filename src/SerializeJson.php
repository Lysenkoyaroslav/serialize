<?php

namespace itea\serializer;
// общее название


use SerializerInterface\SerializerInterface;

class SerializeJson implements SerializerInterface
{

    public $resultEncode;
    public $resultDecode;


    /**
     * @param object $value
     *
     * @return string
     */
    public function serialize($value)
    {

        $this->resultEncode = json_encode($value);

        if (!is_object($value)) {

            echo "Use only class` object!..";

        } elseif (!$this->resultEncode) {

            echo "Encode error!!!";

        } else {

            return $this->resultEncode;

        }
    }

    /**
     * @param object $value
     *
     * @return array
     */
    public function unserialize($value)
    {

        $this->resultDecode = json_decode($value);

        if (!$this->resultDecode) {

            echo "Decode error!!!";

        } else {

            return $this->resultDecode;

        }
    }
}