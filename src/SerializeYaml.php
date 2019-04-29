<?php

namespace Serialize;


use SerializerInterface\SerializerInterface;

class SerializeYaml implements SerializerInterface
{
    /**
     * @param object $value
     * @return string
     */
    public function serialize($value)
    {
        if(!($value instanceof SerializeYaml)){
            echo $value." is not class` object!!!";
        }

        elseif (!yaml_emit($value)) echo "Encode error!..";

        return yaml_emit($value);
    }

    /**
     * @param object $value
     *
     * @return array
     */
    public function unserialize($value)
    {
        if (!yaml_parse($value)) echo "Unknown error!..";

        return yaml_parse($value, true);
    }
}