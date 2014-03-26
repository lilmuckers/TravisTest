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

/**
* Patricks Awesome Travis Experiment Main Class
*
* @category Runner
* @package  Runner
* @author   Patrick McKinley <patrick.mckinley@wmg.com>
* @license  Patrick Super Mega Awesome License
* @link     http://www.patrick-mckinley.com
*/

class RunnerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the connection if it errors properly
     * 
     * @return void
     * @throws Exception
     * 
     * @expectedException Exception
     */
    public function testConnectionError()
    {
        new Runner('derp', 'derp', 'derp', 'derp');
    }
    
    /**
     * Test the insert and select parts
     * 
     * @return void
     */
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
}
