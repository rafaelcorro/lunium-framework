 <?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
 
//Modelo base
class Model{   
    function __construct(){ 
        $this->db=new Database();
    }
}

