<?php

include 'db.inc.php';
class db
{
    protected $con;
    public $command;
    public function __construct()
    {
        $attributes = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Kastar undantag (try/catch) vid fel
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,         // Använder vid true den buffrade version av mysqls api
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // Innehållet i databasen blir till en array  
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;    
                                             SET time_zone = '" . DB_TIMEZON . "';
                                             SET sql_safe_updates = 1, sql_select_limit = 1000, sql_max_join_size = 1000000;
                                             SET SESSION sql_mode = STRICT_ALL_TABLES, NO_ZERO_DATE, NO_ZERO_IN_DATE;" 
                                                                // MYSQL_ATTR_INIT_COMMAND har lite olika kommandon för att
                                                                // till exempel ställa in tidszon, hur mycket uppdateringar som 
                                                                // tillåts för databasen på samma gång (1), hur mycket data som ges
                                                                // tillåtelse att hämta i en förfrågan, etc
            );
        try {
            $this->con = new PDO("mysql:host=". HOST. ";dbname=". DB , USER, PASS, $attributes );
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->con->setAttribute(PDOStatement::fetch, PDO::FETCH_PROPS_LATE);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
    public function get_results($statement)
    {
        $this->command = $this->con->prepare($statement);
        if (!$this->command) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->con->errorInfo());
        }
        else
        {
            $this->command->execute();
        }
    }
    public function close()
    {
        $this->con = null;
    }
}