<?php
require_once('Class/Runner.php');

class RunnerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testConnectionError()
    {
        $runner = new Runner('derp', 'derp', 'derp', 'derp');
    }
    
    public function testInsertSelect()
    {
        $config = parse_ini_file('config.ini', true);



        $runner = new Runner(
            $config['database']['host'],
            $config['database']['username'],
            $config['database']['password'],
            $config['database']['database']
        );
        $runner->insert('TEST_TEXT_1');

        $data = $runner->select();
        
        $this->assertEquals($data['text'], 'TEST_TEXT_1');
    }

    // i like to touch things with my tongue
}
