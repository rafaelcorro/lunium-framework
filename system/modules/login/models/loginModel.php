<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */

class LoginModel extends Model{
   
    private static $inputs=[
        "email" => [
            "filter" => "email",
            "required" => true,
            "value" =>""
        ],
        "password" => [
            "required" => true,
            "value" =>""
        ]
    ];
    
    function __construct(){
        //carga el modelo base
        parent::__construct();
        
    }
    
    /**
     * CheckForm: Validates the login form inputs, checks the user exists and that
     * the supplied password is correct - writing all necessary data into the
     * session if the login was successful. Returns true if everything is okay,
     * otherwise turns false.
     * @access public
     * @return string
     * @throws Exception
     */
    public function checkForm(){      
        self::$inputs["email"]["value"]=$_REQUEST["email"];
        self::$inputs["password"]["value"]=$_REQUEST["password"];
        
        $alert=helper_formValidator(self::$inputs);
        
        $conn=$this->db->connect();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email='".$_REQUEST["email"]."'");    
        $stmt->execute();
     
        $rows = $stmt->fetchALL();
        
        if(isset($rows[0]->password)){

            $hash=password_hash($_REQUEST["password"], PASSWORD_BCRYPT);

            if (!password_verify($_REQUEST["password"], $rows[0]->password)) {
                if($_REQUEST["password"]==""){
                    $alert['password']='Password is empty!.';
                }else{
                    $alert['password']='Invalid password!.';
                }
            }
        }else{
            if(!isset($alert["email"])){
                $alert['email']="Email address does not exist!";
            }    
        }
        
        if(count($alert)==0){
            $session=new Session();
            $session->set("authorized","1");
            $session->set("login_email",$rows[0]->email);
            $session->set("login_name",$rows[0]->name);
            $session->set("login_rol",$rows[0]->rol);
            
            if(isset($_REQUEST["remember"]) && $_REQUEST["remember"]=="on"){
                $this->createRememberCookie($rows[0]->id);
            }
            
            $this->log->add('lunium-framework','info','Session is started',['email'=>$rows[0]->email],'');
        }else{
            $this->log->add('lunium-framework','notice','The requested session access is denied',$alert,['email'=>$_REQUEST["email"]]);
        }
        
        return $alert;
    }
    
    
    public function withCookie(){
        //primero tengo que ver si el usuario está memorizado en una cookie
        if (isset($_COOKIE["user_id_lf"]) && isset($_COOKIE["user_hash_lf"])){
            //compruebo que esas variables no estén vacías
            if ($_COOKIE["user_id_lf"]!="" || $_COOKIE["user_hash_lf"]!=""){
                $conn=$this->db->connect();
                $stmt = $conn->prepare("SELECT * FROM users WHERE id='".$_COOKIE["user_id_lf"]."' AND cookie='".$_COOKIE["user_hash_lf"]."'");
                $stmt->execute();
                $rows = $stmt->fetchALL();
                if(count($rows)>0){
                    $session=new Session();
                    $session->set("authorized","1");
                    $session->set("login_email",$rows[0]->email);
                    $session->set("login_name",$rows[0]->name);
                    $session->set("login_rol",$rows[0]->rol);
                }
            }
        }
    }
    
    
    public static function login() {
        echo "<-------";
       /* // Validate the login form inputs.
        if (!Utility\Input::check($_POST, self::$_inputs)) {
            return false;
        }

        // Check if the user exists.
        $email = Utility\Input::post("email");
        if (!$User = User::getInstance($email)) {
            Utility\Flash::info(Utility\Text::get("LOGIN_USER_NOT_FOUND"));
            return false;
        }
        try {
            $data = $User->data();

            // Check if the provided password fits the hashed password in the
            // database.
            $password = Utility\Input::post("password");
            if (Utility\Hash::generate($password, $data->salt) !== $data->password) {
                throw new Exception(Utility\Text::get("LOGIN_INVALID_PASSWORD"));
            }

            // Create a remember me cookie if the user has selected the option
            // to remained logged in on the login form.
            $remember = Utility\Input::post("remember") === "on";
            if ($remember and ! self::createRememberCookie($data->id)) {
                //throw new Exception();
            }

            // Write all necessary data into the session as the login has been
            // successful.
            Utility\Session::put(Utility\Config::get("SESSION_USER"), $data->id);
            return true;
        } catch (Exception $ex) {
            Utility\Flash::warning($ex->getMessage());
        }
        return false;*/
    }

    /**
     * Create Remember Cookie: Inserts a remember-me hash into database and
     * cookie.
     * @access public
     * @param string $userID
     * @return boolean
     */
    public static function createRememberCookie($userID) {
        $Db = Utility\Database::getInstance();
        $check = $Db->select("user_cookies", ["user_id", "=", $userID]);
        if ($check->count()) {
            $hash = $check->first()->hash;
        } else {
            $hash = Utility\Hash::generateUnique();
            if (!$Db->insert("user_cookies", ["user_id" => $userID, "hash" => $hash])) {
                return false;
            }
        }
        $cookie = Utility\Config::get("COOKIE_USER");
        $expiry = Utility\Config::get("COOKIE_DEFAULT_EXPIRY");
        return(Utility\Cookie::put($cookie, $hash, $expiry));
    }
    
    
    
    
    /*-------------------------------------------------------*/
    
    
}

