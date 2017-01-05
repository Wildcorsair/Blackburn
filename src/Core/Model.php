<?php

namespace Lango\Core;


class Model
{
    public function getProperties()
    {
        $props = [];
        foreach ($this as $prop => $value) {
            $props[] = $prop;
        }

        return $props;
    }
}