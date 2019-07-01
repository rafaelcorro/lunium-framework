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
        require '../system/modules/'.$module[0].'/views/'.$name.'.php';
    }
}

