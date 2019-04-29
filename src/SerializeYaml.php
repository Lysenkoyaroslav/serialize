<?php

namespace itea\serializer;


use SerializerInterface\SerializerInterface;

class SerializeYaml implements SerializerInterface
{
    public $resultEmit;
    public $resultParse;

    /**
     * @param object $value
     * @return string
     */
    public function serialize($value)
    {

        $this->resultEmit = yaml_emit($value);

        if (!is_object($value)) {

            echo "Use only class` object!..";

        } elseif (!$this->resultEmit) {

            echo "Encode error!..";

        } else {

            return $this->resultEmit;

        }
    }

    /**
     * @param object $value
     *
     * @return array
     */
    public function unserialize($value)
    {
        $this->resultParse = yaml_parse($value);

        if (!$this->resultParse) {

            echo "Unknown error!..";

        } else {

            return $this->resultParse;

        }
    }
}