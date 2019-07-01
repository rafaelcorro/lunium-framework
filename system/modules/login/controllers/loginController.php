 <?php
/* 
 * lunium-framework-php
 * @author  Rafael Corro Haba <rafaelcorro@gmail.com>
 */
 
class LoginController extends Controller{
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

        $this->view=$items;
        $this->view->render('main/index');
    }

    function render(){
        $dato="0";
        //creamos el modelo
        $this->model=new ReservasModel();
        $items=$this->model->sear($dato);
        $this->view->activity=$items;

        $this->view->render('reservas/index');
    }
}

