<?php
/**
 * Patricks Awesome Travis Experiment
 *
 * @category  Runner
 * @package   Runner
 * @author    Patrick McKinley <patrick.mckinley@wmg.com>
 * @copyright 2013 Patrick McKinley. (http://www.patrick-mckinley.com)
 * @license   Patrick Super Mega Awesome License
 * @link      http://www.patrick-mckinley.com
 */

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
