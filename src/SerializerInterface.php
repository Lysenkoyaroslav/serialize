<?php

namespace itea\serializer;

interface SerializerInterface
{

    /**
     * @param object $value
     *
     * @return string
     */
    public function serialize($value);

    /**
     * @param object $value
     *
     * @return array
     */
    public function unserialize($value);
}