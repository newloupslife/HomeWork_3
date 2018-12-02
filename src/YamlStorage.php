<?php
require_once __DIR__ . '/KeyValueStore.php';


class YamlStorage extends KeyValueStore
{
    public function __construct()
    {
        $file = file_get_contents('data.yaml');
        $this->array=yaml_parse($file);
        unset($file);

    }

    public function set($key, $value)
    {
        parent::set($key, $value);
        yaml_emit_file("data.yaml",$this->array);
    }

    public function remove($key)
    {
        parent::remove($key);
        yaml_emit_file("data.yaml",$this->array);
    }

    public function clear()
    {
        parent::clear();
        yaml_emit_file("data.yaml",$this->array);
    }
}