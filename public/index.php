<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
require_once '../config/config.php';

if(constant('DEVELOPMENT')=="yes"){
    error_reporting(E_ALL);
    ini_set( 'display_errors','1');
}

require_once '../system/autoload.php';
require_once '../vendor/autoload.php';

$app=new App();

     
