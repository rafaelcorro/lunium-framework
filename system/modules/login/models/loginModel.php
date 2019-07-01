<?php
/* 
 * lunium-framework-php
 * @author  Rafael Corro Haba <rafaelcorro@gmail.com>
 */

class LoginModel extends Model{
    function __construct(){
        parent::__construct();
    }
    protected function dateformat($date){
        //-------CONVERSION DE FECHAS
        $fecha=$datos["date"];
        $fecha=explode("/", trim($fecha));
        $fecha= $fecha[2]."-".$fecha[1]."-".$fecha[0];
        return $fecha;
    }
    public function sear($datos){
       $items=[];
	
        try{
            $conn=$this->db->connect();
            if(is_array($datos) && count($datos)>1){
                $fecha=$this->dateformat($datos["date"]);
                $result = $conn->query("SELECT * FROM activity WHERE date_start>'".$fecha."'"); 
            }else{
                $result = $conn->query("SELECT * FROM activity");
            }
            if ($result) {           
                while($row=$result->fetch_array()){                               
                    $item=new Activity();
                    $item->title=$row["title"];
                    $item->description=$row["description"];
                    $item->price=$row["price"];

                    array_push($items,$item);
                }
                // free result set
                $result->close();
            }else{
                echo "HA FALLADO LA CONSULTA";
            }
            return $items;

        }catch(pdoexception $e){
            echo $e->getMessage();
        }
        return 0;
    }
}

