
 <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-md-offset-4">
                 <div class="panel-heading">
                        <h3 class="com">
                <?php if(isset($_SESSION['success']))
 {
    echo $_SESSION['success'];
} 
else if (isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }

?></h3>
                    </div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" id="login" action="index.php?action=controller" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control " placeholder="Username" name="username" type="username" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required/>
                                </div>
                                <div class="checkbox">
                                    <label>
                                       
                                   
                                  Enter Image Text </label><br>
<input name="captcha" type="text">
<img src="includes/captcha.php" /><br>  

                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
unset($_SESSION['success']);

?>