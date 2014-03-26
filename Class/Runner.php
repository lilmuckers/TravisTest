<?php
class Runner
{
    private $_db;

    public function __construct($host, $username, $password, $db)
    {
        $this->_db = new mysqli($host, $username, $password, $db);
        if ($this->_db->connect_errno) {
            throw new Exception(
                "Failed to connect to MySQL:" . $this->_db->connect_error,
                $this->_db->connect_errno
            );
        }
    }

    public function insert($value)
    {
        mysqli_query($this->_db, "TRUNCATE TABLE text_table");
        return mysqli_query($this->_db, "INSERT INTO text_table (text) VALUES ('".$value."')");
    }

    public function select()
    {
        $result = mysqli_query($this->_db, "SELECT text FROM text_table LIMIT 1");
        return $result->fetch_array();
    }
}
