#!/usr/bin/env php
<?php
require_once __DIR__ . "/../src/KeyValueStore.php";
require_once __DIR__ . "/../src/console_helper.php";
require_once __DIR__ . "/../src/PhpStorage.php";
require_once __DIR__ . "/../src/JsonStorage.php";
require_once __DIR__ . "/../src/YamlStorage.php";



$storagePHP = new PhpStorage();

$storagePHP->set("id",25);
$storagePHP->set("phone","+380-555-55-55");
$storagePHP->set("name","Oleksandr");
$storagePHP->set("Surname","Uchkin");
$storagePHP->set("clear","");

writeln($storagePHP->get("phone"));
writeln($storagePHP->get("clear","anything"));

$storagePHP->remove("phone");
$storagePHP->printAll();
$storagePHP->clear();
$storagePHP->printAll();



$storageJSON = new JsonStorage("/data/data.json");
$storageJSON->set("id","25");
$storageJSON->set("phone","+380 000 00 00");
$storageJSON->set("name","Oleksandr");
$storageJSON->set("Surname","Uchkin");
$storageJSON->set("clear","");
$storageJSON->printAll();
$storageJSON->remove("id");



$storageYAML = new YamlStorage("/data/data.yaml");
$storageYAML->set("id","25");
$storageYAML->set("phone","+380 000 00 00");
$storageYAML->set("name","Oleksandr");
$storageYAML->set("Surname","Uchkin");
$storageYAML->set("clear","");
$storageJSON->remove("id");
$storageYAML->printAll();
