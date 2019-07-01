<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

class General{
    function menu(){
        //leemos los directorios que están en modules para leer el menú
        $directory = opendir("../system/modules/"); //ruta actual
        $items=array();
        while ($file = readdir($directory)) 
        {
            if (!is_dir($file)){
                try{
                    $filename="../system/modules/".$file."/config.php";
                    if(file_exists($filename)){
                        require $filename;
                        $items[]=array('modulo'=>$file,'parent'=>$menu_parent,'title'=>$menu_title);
                    }else{
                        throw new Exception("Module '".$file."': <span style='color:red'>Configuration file  not found!!!</span>");
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
                }
            }
        }
        $parents=array();
        //extraemos los padres de los items del menú
        foreach($items as $value){
            $parent=$value['parent'];

            if(!in_array($parent, $parents)){
                array_push($parents,$parent);
            }
        }
        
        //cargamos el array de configuración del menú
        require_once '../themes/'. constant('TEMPLATE').'/config.php';
        
        //pintamos el menú
        $li_attr=$menuAttr["li-menu"];
        $a_attr=$menuAttr["a-menu"];
        $menu="<ul ".$menuAttr["ul-menu"].">";
        foreach($parents as $value){
            if($value!="none"){
                //li-parent
                $menu=$menu."<li ".$menuAttr["li-parent"].">";
                $menu=$menu."<a ".$menuAttr["a-parent"]." href=''>".$value."</a>";
                $menu=$menu."<ul ".$menuAttr["ul-submenu"].">";
                $li_attr=$menuAttr["li-submenu"];
                $a_attr=$menuAttr["a-submenu"];
            }
            foreach ($items as $value2){
                if($value==$value2["parent"] && $value2["title"]!="none"){
                    $menu=$menu."<li ".$li_attr."><a ".$a_attr." href='/".constant('DIRECTORY')."/public/".$value2["modulo"]."/'>".$value2["title"]."</a></li>";
                } 
            }
            if($value!="none"){
                $menu=$menu."</ul></li>";
                $li_attr=$menuAttr["li-menu"];
                $a_attr=$menuAttr["a-menu"];
            }
        }
        $menu=$menu."</ul>";
        
        return $menu;
    }
}