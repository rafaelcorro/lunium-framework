<?php
class Autoloader{
    protected static $extension = '.php';
    protected static $path = __DIR__;
    protected static $iterator = null;

    public static function loader($className){

        $url=isset($_GET["url"]) ? $_GET['url']:null;

        //tratamos la url 
        $url=rtrim($url,'/');
        $url=explode('/',$url);
        
        if(empty($url[0])){
          $activeModule="main"; 
        }else{
          $activeModule=$url[0]; 
        }
       
        $directory = new RecursiveDirectoryIterator(static::$path, RecursiveDirectoryIterator::SKIP_DOTS);

        if (is_null(static::$iterator)) {
            static::$iterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);
        }

        $filename = $className . static::$extension;

        foreach (static::$iterator as $file) {
            //filtramos para que solo cargue las clases del módulo activo y las clases generales
            $libs = strpos($file->getPathname(), "system/core/");
            $module = strpos($file->getPathname(), "system/modules/".$activeModule);
            
            if (!$module === false || !$libs === false) {
                
                if (strtolower($file->getFilename()) === strtolower($filename)) {
                    if ($file->isReadable()) {
                        include_once $file->getPathname();
                    }
                    break;
                }
            }
        }
    }

    public static function setExtension($extension){
        static::$extension = $extension;
    }

    public static function setPath($path){
        static::$path = $path;
    }
}

Autoloader::setExtension('.php');
spl_autoload_register('Autoloader::loader');

