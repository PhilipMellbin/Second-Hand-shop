<?php
// Not shure if this should be an abstract class or a regular class. thinking because of highrarcy, but i have no abstract functions yet.
include 'db.inc.php';
abstract class ABdb 
{
    protected $con;
    abstract function con_process();
    protected function con_start(){}
    protected function con_end()
    {
        $attributes = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Uses try catch upon error
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,         // tries, if true, to use the buffered version
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // db contents become an array
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;    
                                             SET time_zone = '" . DB_TIMEZON . "';
                                             SET sql_safe_updates = 1, sql_select_limit = 1000, sql_max_join_size = 1000000;
                                             SET SESSION sql_mode = STRICT_ALL_TABLES, NO_ZERO_DATE, NO_ZERO_IN_DATE;" 
                                                                // MYSQL_ATTR_INIT_COMMAND har lite olika kommandon för att
                                                                // till exempel ställa in tidszon, hur mycket uppdateringar som 
                                                                // tillåts för databasen på samma gång (1), hur mycket data som ges
                                                                // tillåtelse att hämta i en förfrågan, etc
            );
        try
        {
            $this->con = new PDO("mysql:host=". HOST. ";dbname=". DB , USER, PASS, $attributes );
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->con->setAttribute(PDOStatement::fetch, PDO::FETCH_PROPS_LATE);
        }
        catch(PDOException $e) 
        {
            echo "!502(Connection Error. Check ABdb.php.
            If you are a customer, please contact philip.mellbin@elev.ga.lbs.se!
            Error message: " . $e->getMessage();
          } 
    }
}