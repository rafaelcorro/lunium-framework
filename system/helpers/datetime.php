<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

if (!function_exists('date_interval')) {
    /**
     * Permite saber la diferencia de tiempo entre dos fechas
     *
     * @param \Datetime $date_ini   Fecha de comienzo
     * @param \Datetime $date_fin   Fecha final
     * @return array {"d","h","m","s"}
     */
    function date_interval($date_ini,$date_fin)
    {
        $datetime1 = new DateTime($date_ini);
        $datetime2 = new DateTime($date_fin);
        
        $interval=array();
        
        $diff = $datetime1->diff($datetime2);
        $interval["d"]=$diff->format('%d');
        $interval["h"]=( ($diff->days * 24 )) + ( $diff->i );
        $interval["m"]=( ($diff->days * 24 ) * 60 ) + ( $diff->i );
        $interval["s"]=( ( ($diff->days * 24 ) * 60 ) + ( $diff->i ))* 60;
        
        //format
        return $interval;
    }
}

if (!function_exists('dateformat')) {
    /**
     * Da formato a una fecha tanto para mostrarla como para insertarla en la base de datos
     *
     * @param string    $date
     * @return string
     */
    function dateformat($date)
    {
        $separator= strpos($date, "/");
        if($separator === false){
            $date=explode("-", trim($date));
            $date= $date[2]."/".$date[1]."/".$date[0];
        }else{
            $date=explode("/", trim($date));
            $date= $date[2]."-".$date[1]."-".$date[0];
        }
        return $date;
            
    }
}