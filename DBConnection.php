<?php
date_default_timezone_set('America/Sao_Paulo');

/**
 * @package PHP Rest API(DBConnection)
 *
 */

// Database Connection

class DBConnection
{

    private $_dbHostname = "localhost";
    private $_dbName = "u576269954_pxpybr_newweb";
    private $_dbUsername = "u576269954_pxpybr_apiweb";
    private $_dbPassword = "Fadac0cada!2023";
    private $_con;

    public function __construct()
    {
        try {
            $this->_con = new PDO("mysql:host=$this->_dbHostname;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    // return Connection
    public function returnConnection()
    {
        return $this->_con;
    }
}

?>