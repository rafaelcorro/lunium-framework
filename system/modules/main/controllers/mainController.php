<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
 
class MainController extends Controller{
    //private $model;
    function __construct(){
        //carga el controlador base
        parent::__construct();

        $this->view->message="Esta es la página principal.";
    }

    function searchActivity(){
        $date=$_POST["date"];
        $numpeople=$_POST["numpeople"];

        $items=$this->model->sear(['date' => $date, 'numpeople'=>$numpeople]);
        if(count($items)>0){
            $this->view->activity=$items;
        }
        $this->view->render('main/index');
    }

    function render(){
        $data="0";
        //creamos el modelo
        //$this->model=new MainModel();
        $items=$this->model->sear($data);
        $this->view->activity=$items;

        $this->view->render('main/index');
    }
}
