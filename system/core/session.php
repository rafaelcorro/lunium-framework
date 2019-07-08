<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
class Session {

    /**
     * Delete: Deletes the value of a specific key of the session.
     * @access public
     * @param string $key
     * @return boolean
     */
    public function delete($key) {
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    /**
     * Close: Close the session.
     * @access public
     * @return void
     */
    public function close() {
        session_unset();
        session_destroy();
    }
    
    /**
     * Authorized: Checks if a user has logged in.
     * @access public
     * @return void
     */
    public function authorized() {
        if(isset($_SESSION["authorized"]) && $_SESSION["authorized"]=="1"){
            return true;   
        }else{
            return false;
        }
    }

    /**
     * Get: Returns the value of a specific key of the session if it exists.
     * @access public
     * @param string $key
     * @return string|null
     */
    public function get($key) {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Init: Starts the session.
     * @access public
     * @return void
     */
    public function init() {
        if(!isset($_SESSION)){ 
            session_start();
        }
    }

    /**
     * Set: Sets a specific value to a specific key of the session.
     * @access public
     * @param string $key
     * @param string $value
     * @return string
     */
    public function set($key, $value) {
        return($_SESSION[$key] = $value);
    }
    
    

}
