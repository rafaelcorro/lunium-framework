<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
if (!function_exists('helper_formAction')) {
    /**
     * Devuelve la ruta para el action del formulario
     * @param string    $controller
     * @param string    $method
     * @return string
     */
    function helper_formAction($controller,$method)
    {
        $url=constant('PROTOCOL').'://'.$_SERVER['SERVER_NAME'].'/'.constant('DIRECTORY').'/public/'.$controller.'/'.$method.'/';
        return $url;  
    }
}


function helper_formValidator($fields){
    $alert=array();
      
    foreach($fields AS $field=>$type){
        if($field=="email"){
            if($type["value"]==""){
                $alert["email"]="The value cannot be empty";
            }else if (!filter_var($type["value"], FILTER_VALIDATE_EMAIL)) {
                $alert["email"]= "Is not a valid email address";
            }
        }
    }   
    return $alert;
}
