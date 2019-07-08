<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
class App{
    function __construct(){
        $this->log=new Syslog();
        
        $this->helpersService();
        //obtenemos la url
        $url=isset($_GET["url"]) ? $_GET['url']:null;

        //tratamos la url 
        $url=rtrim($url,'/');
        $url=explode('/',$url);

        if(empty($url[0])){
            $controller= new MainController;
            $fileModel='../system/modules/main/models/mainModel.php';
            if(file_exists($fileModel)){  
                $controller->loadModel("MainModel");
            }
            $controller->render();
            return false;
        }
        
        $fileController='../system/modules/'.$url[0].'/controllers/'.$url[0]."Controller.php";
        $fileModel='../system/modules/'.$url[0].'/models/'.$url[0]."Model.php";
        
        if(file_exists($fileController)){
            $controller=$url[0].'Controller';
            $controller=new $controller;
            
            //llamanos al modelo
            if(file_exists($fileModel)){
                $model=$url[0].'Model';
                $controller->loadModel($model);
            }
            
            //entra en el caso que se requiera llamar a un método
            if(isset($url[1])){
               //llamamos al método
               if(method_exists($controller, $url[1])){
                       $controller->{$url[1]}();
               }else{
                  //página no encontrada
                  $this->pageNotFound();
               }
            }else{
               $controller->render();
            }
        }else{
            //página no encontrada
            $this->pageNotFound();
        }   
    }
    public function pageNotFound(){
        $alert="Page not found: ".$_SERVER['REQUEST_URI'];
        $this->log->add('lunium-framework','notice',$alert,'','');
        require_once '../system/modules/main/controllers/mainController.php';
        $controller=new MainController;
        $controller->pageError();
    }
    public function helpersService()
    {
       //cargamos automaticamente todos los helpers
       $dirname=$_SERVER['DOCUMENT_ROOT'].'/'.constant('DIRECTORY').'/system/helpers/';
        try{
            $dir = new DirectoryIterator($dirname); 

            foreach ($dir as $helpersfilename){
                $helper='../system/helpers/'.$helpersfilename;
                if(file($helper)){
                 require_once($helper);
                }
             }
        }catch(Exception $e){
            echo "<p style='color:red;'>Please, correctly configure the root directory in the config/config.php file</p>";
            echo $e->getMessage();
            die();
        }
    }
}

