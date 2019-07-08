<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/*  
 * Niveles de logs:
 *  DEBUG (100): Detección de errores.
    INFO (200): Eventos de interés particular. Inicios de sesión, etc.
    NOTICE (250): Eventos normales, que podrían indicar algún posible fallo. Intentos de acceso denegado, etc.
    WARNING (300): Eventos que no han generado un error, pero podrían llegar a provocarlos.
    ERROR (400): Errores aislados en el sistema, alguna parte de código que no ha podido llegar a ejecutarse.
    CRITICAL (500): Errores graves, alguna función deja de funcionar completamente, por ejemplo el registro de usuarios.
    ALERT (550): Alertas importantes por ejemplo la base de datos no funciona.
    EMERGENCY (600): El sistema no funciona y nadie puede usarlo.
 */

class Syslog{
    public $extradata=array();
            
    public function __construct() {

    }
    /**
     * Add: añade un registro al log del sistema.
     * @access public
     * @param string $channel indica el nombre del canal
     * @param string $level es el nivel de registro: DEBUG,INFO,NOTICE...
     * @param string $log mensaje de registro
     * @param array $data datos del registro. ej. ['name'=>'Jhon', 'surname'=>'Page']
     * @param array $extra mensaje de registro. ej. ['ip'=>'127.0.0.1']
     */
    public function add($channel,$level,$log,$data,$extra){
        // Inicializa el control de logs
        $logger = new Logger($channel);
        
        $level=strtoupper($level);
        $loggerLevel="Logger::".$level;
        
        $logger->pushHandler(new StreamHandler('../log/sys.log',$loggerLevel));
       
        if(is_array($extra)){
            $this->extradata=$extra;
            $logger->pushProcessor(function ($entry) {
                foreach($this->extradata AS $field=>$value){
                    $entry['extra'][$field]=$value;
                }
                return $entry;
            });
        }
        
        if(is_array($data)){
            $logger->$level($log,$data);
        }else{
            $logger->$level($log);
        }
    }
}

