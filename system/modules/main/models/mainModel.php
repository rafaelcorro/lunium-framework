<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

class MainModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function sear($datos){     
        try{
            $conn=$this->db->connect();

            if(is_array($datos) && count($datos)>1){
                $date=helper_dateFormat($datos["date"]);
                $stmt = $conn->prepare("SELECT * FROM activity WHERE date_start>'".$date."'"); 
            }else{
                $stmt = $conn->prepare("SELECT * FROM activity");
            }
            
            $stmt->execute();
            $rows = $stmt->fetchALL();
            
            return $rows;

        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return 0;
    }
}


