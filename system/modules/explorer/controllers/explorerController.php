<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
 
class ExplorerController extends Controller{

    function __construct(){
        //carga el controlador base
        parent::__construct();

        $this->view->message="Esta es la página vacía.";
    }


    function render(){
        $dato="0";
        //creamos el modelo
        $this->model=new ExplorerModel();

        $this->view->render('explorer/index');
    }
}

