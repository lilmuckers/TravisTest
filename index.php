<?php

require_once('Class/Runner.php');

$config = parse_ini_file('config.ini', true);

$runner = new Runner(
    $config['database']['host'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['database']
);


$runner->insert('derpderp');

$data = $runner->select();
echo $data['text'];
