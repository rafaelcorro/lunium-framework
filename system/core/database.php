<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $timezone;

    public function __construct(){
        $this->host=constant('HOST');
        $this->db=constant('DB');
        $this->user=constant('USER');
        $this->password=constant('PASSWORD');
        $this->charset=constant('CHARSET');
        $this->timezone=constant('TIMEZONE');
    }

    function connect(){
        try{
            $connection="mysql:host=".$this->host.";dbname=".$this->db;
            $options=[
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ];
            
            $conn = new PDO( $connection, $this->user, $this->password, $options );

            return $conn;
        }catch(PDOexception $e){
            print_r('Error connection: '.$e->getMessage());
        }
    }
}

