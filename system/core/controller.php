<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

//controlador base
class Controller{
    function __construct(){
        //creamos la vista
        $this->view=new View();
    }

    function loadModel($model){
        $this->model=new $model();	
    }
}
