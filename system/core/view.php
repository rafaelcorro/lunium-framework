<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

//vista base
class View{
    function __construct(){

    }

    function render($name){
        $module=explode('/',$name);
        require_once '../themes/'.constant('TEMPLATE').'/header.php';
        require_once '../system/modules/'.$module[0].'/views/'.$name.'.php';
        require_once '../themes/'.constant('TEMPLATE').'/footer.php';
    }
}

