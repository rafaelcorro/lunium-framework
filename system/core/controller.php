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

        $url=helper_url();
        
        $session=new Session();
        $session->init();
        
        $login=new LoginModel();
        $login->withCookie();
        
        if(!$session->authorized()){
            $page=helper_string_url($url);
            $alert="Not authorized to access this page: ".$page;
            $this->log->add('lunium-framework','notice',$alert,'','');
        }
        if($session->authorized()){
            $this->view->message="Esta es la página principal.";
        }elseif($url[0]!="login"){
            header('Location: /'. constant('DIRECTORY').'/public/login/');
            exit;
        }
    }

    function loadModel($model){
        $this->model=new $model();	
    }
}
