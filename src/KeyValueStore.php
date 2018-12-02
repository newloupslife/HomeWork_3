<?php
require_once __DIR__ . '/KeyValueStoreInterface.php';

abstract class KeyValueStore implements KeyValueStoreInterface
{
    public $array=[];

    public function set($key, $value)
    {
        $this->array[$key] = $value;
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key,$this->array) && $this->array[$key] != '')
            return $this->array[$key];

        return $default;
    }

    public function has($key)
    {
        if (array_key_exists($key,$this->array) && $this->array[$key] != '')
        {
            return true;
        }
        return false;
    }

    public function remove($key)
    {
        if (array_key_exists($key,$this->array))
            unset($this->array[$key]);
        else
            echo "Value by this key: $key 'not' exist";
    }

    public function clear()
    {
        $this->array = array();
    }

    public function printAll()
    {
        print_r($this->array);
    }

}