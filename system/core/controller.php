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
        $this->log=new Syslog();
        
        $url=$_SERVER["REQUEST_URI"];
        $url=rtrim($url,'/');
        $url=explode('/',$url);
        
        $session=new Session();
        $session->init();
        
        include('../system/modules/login/models/loginModel.php');
        $login=new LoginModel();
        $login->withCookie();
        
        if(!$session->authorized()){
            $alert="Not authorized to access this page: ".$url[3];
            $this->log->add('lunium-framework','notice',$alert,'','');
        }
        if($session->authorized()){
            $this->view->message="Esta es la página principal.";
        }elseif($url[3]!="login"){
            header('Location: /'. constant('DIRECTORY').'/public/login/');
            exit;
        }
    }

    function loadModel($model){
        $this->model=new $model();	
    }
}
