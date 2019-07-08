<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
?>

<div class="container"> 
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Account Login</h3>
                </div>
                <div class="panel-body" style="margin-bottom:120px;">
                    <form action="<?= helper_formAction("login","login"); ?>" method="post">
                        <div class="form-group">
                            <label for="email-input">Email <span class="text-danger">*</span></label>
                            <input type="text" value="<?php if(isset($_REQUEST["email"])){echo $_REQUEST["email"];}?>" id="email-input" class="form-control" name="email" />
                            <?php
                            if(isset($this->alert["email"]) && $this->alert["email"]!=""){
                                echo '<div class="alert alert-danger" role="alert"><strong>Oops!</strong> ';
                                   echo $this->alert["email"]; 
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="password-input">Password <span class="text-danger">*</span></label>
                            <input type="password"  id="password-input" class="form-control" name="password" />
                            <?php
                            if(isset($this->alert["password"]) && $this->alert["password"]!=""){
                                echo '<div class="alert alert-danger" role="alert"><strong>Oops!</strong> ';
                                   echo $this->alert["password"]; 
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="checkbox">
                            <label for="remember">
                                <input type="checkbox" id="remember" name="remember" /> Remember me
                            </label>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?php //echo App\Utility\Token::generate(); ?>" />
                        <button type="submit" class="btn btn-primary">Sign In</button>
                        <a href="<?= ""//$this->makeURL("register"); ?>" class="btn btn-link">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
