<?php

class ArrayManipulator
{
    private $data = [];

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function __clone()
    {
        $this->data = array_map(function ($item) {
            return (is_object($item) ? clone $item : $item);
        }, $this->data);
    }


}