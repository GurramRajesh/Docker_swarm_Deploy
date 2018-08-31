
<?php
session_start();
if(!empty($_SESSION))
{
  header("location: create_project.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    body{padding-top:20px;}
</style>
<body>
<div class="container">
    <div class="row">
        <form name="login" action="admin_login_insert.php" method="POST">
                <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usere Name" name="username" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                            </label>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="submit">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>