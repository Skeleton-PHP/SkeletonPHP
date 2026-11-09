
<?php

namespace SkeletonPHP\Database\Connection;

use SkeletonPHP\classes\Config\Config;
use Exception;

class DBConnection
{
    // Hold the single instance of DBConnection
    private static $instance = null;

    // MySQLi connection resource
    private $conn;

    /**
     * Private constructor to prevent direct instantiation.
     *
     * @throws Exception If the connection cannot be established.
     */
    private function __construct()
    {
        $config = new Config();
        $servername = $config->getHost();
        $username   = $config->getUsername();
        $password   = $config->getPassword();
        $dbname     = $config->getDatabase();

        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$this->conn) {
            $errorMessage = "Database connection failed: " . mysqli_connect_error();
            error_log($errorMessage);
            throw new Exception("Database connection failed. Please contact support.");
        }
    }

    /**
     * Returns the singleton instance of DBConnection.
     *
     * @return DBConnection
     */
    public static function getInstance(): DBConnection
    {
        if (self::$instance === null) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    /**
     * Returns the active MySQLi connection.
     *
     * @return \mysqli
     */
    public function getConnection(): \mysqli
    {
        return $this->conn;
    }

    /**
     * Execute a SELECT query and return the result set as an array.
     *
     * @param string $query The SELECT query to be executed.
     * @return array Array of result rows.
     * @throws Exception If the query execution fails.
     */
    public function runSelectQuery(string $query): array
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            $errorMessage = "Query failed: " . mysqli_error($this->conn);
            error_log($errorMessage);
            throw new Exception("Query execution failed. Please contact support.");
        }
        // Fetch all rows as associative arrays
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $rows;
    }

    /**
     * Close the database connection when the instance is destroyed.
     */
    public function __destruct()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}
?>
