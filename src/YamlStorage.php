<?php
require_once __DIR__ . '/KeyValueStore.php';


class YamlStorage extends KeyValueStore
{
    private $path;
    public function __construct($path)
    {
        $this->path=$path;
        $file = file_get_contents($this->path);
        $this->array=yaml_parse($file);
        unset($file);

    }

    public function set($key, $value)
    {
        parent::set($key, $value);
        yaml_emit_file($this->path,$this->array);
    }

    public function remove($key)
    {
        parent::remove($key);
        yaml_emit_file($this->path,$this->array);
    }

    public function clear()
    {
        parent::clear();
        yaml_emit_file($this->path,$this->array);
    }
}