
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bird Labelling - Sign Up</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/mySignUp.css">

</head>
<body>



<div class="container">
<div class="row"><br></div>
<div class="row">

    <h3 class="col-sm-offset-3 col-sm-6">Signup</h3>
</div>

<div class="row"><br></div>
<div class="row">
  
    <div class="col-sm-6">
        <form action='signUpCheck.php' method="post" accept-charset="utf-8" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />                        </div>
                <div class="col-xs-6 col-md-6">
                    <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  />                        </div>
            </div>
            <input type="text" name="email" value="" class="form-control input-lg" placeholder="Your Email"  /><input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  />
            <input type="text" name="phone_no" value="" class="form-control input-lg" placeholder="Add Your Mobile Number"  /> 
               
              
            
            <div class="row"><br></div>
            <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Create my account</button>
        </form>          
    </div>
  </div>
</div>
</div>
  
</body>
</html>