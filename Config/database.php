<?php
class Database
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    public function __construct()
    {
        if (!file_exists(dirname(__DIR__) . '/.env'))
        {
            die('.env file not found!');
        }
        
        // Parse .env file
        $lines = file(dirname(__DIR__) . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line)
        {
            if (strpos(trim($line), '#') === 0) continue; // Skip comments
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_ENV))
            {
                $_ENV[$name] = $value;
            }
        }

        // Assign environment variables to class properties
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];

        // Debugging log
        error_log("DB_HOST: " . $this->host);
        error_log("DB_NAME: " . $this->dbname);
        error_log("DB_USERNAME: " . $this->username);
        error_log("DB_PASSWORD: " . $this->password);
    }

    public function getConnection()
    {
        $this->conn = null;

        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        }
        catch (PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn = null; // Close the PDO connection
    }
}
