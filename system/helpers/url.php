
<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

if (!function_exists('helper_url')) {
    /**
     * Permite saber la url actual
     *
     * @return array
     */
    function helper_url(){
        //obtenemos la url
        $url=isset($_GET["url"]) ? $_GET['url']:'main';
        //quitamos la carpeta public de la url
        $url=str_replace("public/", "", $url);
    
        //tratamos la url 
        $url=rtrim($url,'/');
        $url=explode('/',$url);
        return $url;
    }
}
if (!function_exists('helper_string_url')) {
    /**
     * Permite saber la url actual
     * @param array    $url
     * @return string
     */
    function helper_string_url($url){
        $surl="";
        foreach ($url as $value) {
            $surl=$surl."/".$value;
        }
        return $surl;
    }
}



?> 