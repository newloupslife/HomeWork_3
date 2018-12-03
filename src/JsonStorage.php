<?php
require_once __DIR__ . '/KeyValueStore.php';

class JsonStorage extends KeyValueStore
{
    private $path;
    public function __construct($path)
    {
        $this->path=$path;
        $file = file_get_contents($path);
        $this->array=json_decode($file,TRUE);
        unset($file);
    }

    public function set($key, $value)
    {
        parent::set($key, $value);
        file_put_contents($this->path,json_encode($this->array));
    }

    public function remove($key)
    {
        parent::remove($key);
        file_put_contents($this->path,json_encode($this->array));
    }

    public function clear()
    {
        parent::clear();
        file_put_contents($this->path,json_encode($this->array));
    }

}