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

/**
 * Patricks Awesome Travis Experiment Main Class
 *
 * @category Runner
 * @package  Runner
 * @author   Patrick McKinley <patrick.mckinley@wmg.com>
 * @license  Patrick Super Mega Awesome License
 * @link     http://www.patrick-mckinley.com
 */
class Runner
{
    /**
     * Commenting for the db
     * 
     * @var mysqli
     */
    private $_db;
    
    /**
     * Connect to the DB
     * 
     * @param string $host     the hostname for the db
     * @param string $username the username for the db
     * @param string $password the apssword for the db
     * @param string $db       the database name
     * 
     * @return void
     * 
     * @throws Exception
     */
    public function __construct($host, $username, $password, $database)
    {
        $this->_db = new mysqli($host, $username, $password, $database);
        if ($this->_db->connect_errno) {
            throw new Exception(
                "Failed to connect to MySQL:" . $this->_db->connect_error,
                $this->_db->connect_errno
            );
        }
    }
    
    /**
     * Insert a value into the table as the only value
     * 
     * @param string $value the value to insert into the DB
     * 
     * @return bool
     */
    public function insert($value)
    {
        mysqli_query($this->_db, "TRUNCATE TABLE text_table");
        return mysqli_query($this->_db, "INSERT INTO text_table (text) VALUES ('".$value."')");
    }
    
    /**
     * Select the one value from the DB
     * 
     * @return array
     */
    public function select()
    {
        $result = mysqli_query($this->_db, "SELECT text FROM text_table LIMIT 1");
        return $result->fetch_array();
    }
}
