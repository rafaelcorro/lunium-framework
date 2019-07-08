 <?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
 
class LoginController extends Controller{
    private $email;
    private $pass;
    
    function __construct(){
        //carga el controlador base
        parent::__construct();
        
        $session=new Session();
        $session->init();

        $this->view->message="Esta es la página principal.";
    }

    function login(){
        $this->model=new LoginModel();
        $this->view->alert=$this->model->checkForm();
        
        if(count($this->view->alert)>0){
            $this->view->render('login/index');
        }else{
            header('Location: /'. constant('DIRECTORY').'/public/main/');
        }   
        
        $this->view->render('login/index');
    }
    
    function logout(){
        $session=new Session();
        $session->close();
        $this->view->render('login/index');
    }

    function render(){
        //creamos el modelo
        $this->model=new LoginModel();

        $this->view->render('login/index');
    }
}

