<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
 
class DemoController extends Controller{
    //private $model;
    function __construct(){
        //carga el controlador base
        parent::__construct();

        $this->view->message="Esta es la página de demostración.";
    }

    function searchActivity(){
        $date=$_POST["date"];
        $numpeople=$_POST["numpeople"];

        $items=$this->model->sear(['date' => $date, 'numpeople'=>$numpeople]);

        $this->view=$items;
        $this->view->render('demo/index');
    }

    function render(){
        $dato="0";
        //creamos el modelo
        $this->model=new DemoModel();
  
        //$this->view->activity=$items;

        $this->view->render('demo/index');
    }
}

