<?php

namespace Serialize; // общее название


use SerializerInterface\SerializerInterface;

class SerializeJson implements SerializerInterface
{
    /**
     * @param object $value
     *
     * @return string
     */
    public function serialize($value)
    {
        if (!is_object($value)) {
            echo $value."is not class` object";
    }

        elseif (!json_encode($value)) echo "Encode error!!!";

        else return json_encode($value);
    }

    /**
     * @param object $value
     *
     * @return array
     */
    public function unserialize($value)
    {
        if(!json_decode($value)) echo "Decode error!!!";

        return json_decode($value, true);
    }
}