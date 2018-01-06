<?php
function uHeader() {
  echo "<table class='HeaderTable' width='98%' border='0' cellpadding='1'>";
  echo "<col width= 10%>";
  echo "<col width= 90%>";
  echo "<tbody>";
  echo "<tr>";
  echo "<td width='10%' class='image'>";
  echo "<img src='Logo.jpg' class='img-responsive' style='width:Auto' alt='Main Logo'>";
  echo "</td>";
  echo "<td width='90' class='HeaderTxt'>";
  echo "<h1 class ='Trinity'>Trinity <span class='Pentacostal'> Pentacostal<span class='Church'> Church</span> </h1>";
  echo "<h2 class='Father'>Father<span class='Son'> . Son .<span class='HolySpirit'> Holy Spirit</h2>";
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
}

function nbar() {

  echo "<nav class='navbar navbar-inverse'>";
  echo "<div class='container-fluid'>";
  echo "<div class='navbar-header'>";
  echo "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>";
  echo "<span class='icon-bar'></span>";
  echo "<span class='icon-bar'></span>";
  echo "<span class='icon-bar'></span>";
  echo "</button>";

  echo "</div>";
  echo "<div class='collapse navbar-collapse' id='myNavbar'>";
  echo "<ul class='nav navbar-nav'>";
  echo "<li class='active'><a href='homepage.php'>Home</a></li>";
  echo "<li class='active'><a href='eventsuser.php'>Events</a></li>";

  echo "<li class ='dropdown'>";
  echo "<a class= 'dropdown-toggle' data-toggle='dropdown' hred='#'> About Us";
  echo "<span class = 'caret'></span></a>";
  echo "<ul class='dropdown-menu'>";
  echo "<li><a href='About.php'>About Us</a></li>";
  echo "<li><a href='#'>FAQ</a></li>";
  echo "</ul>";

  echo "<li class ='dropdown'>";
  echo "<a class= 'dropdown-toggle' data-toggle='dropdown' hred='#'> Contact us";
  echo "<span class = 'caret'></span></a>";
  echo "<ul class='dropdown-menu'>";
  echo "<li><a href='Contactus.php'>Contact us Online</a></li>";
  echo "<li><a href='#'>Find our Location</a></li>";
  echo "</ul>";

  echo "</ul>";
  echo "<ul class='nav navbar-nav navbar-right'>";
  echo "<li><a data-toggle='modal' data-target='#loginModal'><span class='glyphicon glyphicon-log-in '></span>";
  echo "<span class='login'> LogIn</a></li>";

}

function logIn() {

  echo "<nav class='navbar navbar-inverse bg-primary'>";
  echo "<div class='container-fluid'>";
  echo "<div class='navbar-header'>";
  echo "<ul class='nav navbar-nav navbar-right'>";
  echo "<li><a data-toggle='modal' data-target='#loginModal'><span class='glyphicon glyphicon-log-in '></span>";
  echo "<span class='login'> LogIn</a></li>";

  echo "<form id='sign_In' action='loginCheck.php' method='POST'>";

  echo "<div class='modal fade' id='loginModal' role='dialog'>";
  echo "<div class='modal-dialog'>";
  echo "<div class='modal-content'>";
  echo "<div class='modal-header' style=padding:35px 50px>";
  echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
  echo "<h4><span class='glyphicon glyphicon-lock'></span> Login</h4>";
  echo "</div>";
  echo "<div class='modal-body' style='padding:40px 50px;'>";
  echo "<form role='form'>";
  echo "<div class='form-group'>";
  echo "<label for='usrname'><span class='glyphicon glyphicon-user'></span> Username</label>";
  echo "<input type='text' class='form-control' id='email' name='email' placeholder='Enter email'>";
  echo "</div>";

  echo "<div class='form-group'>";
  echo "<label for='mypw'><span class='glyphicon glyphicon-eye-open'></span> Password</label>";
  echo "<input type='password' class='form-control' id='mypw' name='mypw' placeholder='Enter password'>";
  echo "</div>";


  echo "<div class='checkbox'>";
  echo "<label><input type='checkbox' value=' ' checked>Remember me</label>";
  echo "</div>";
  echo "<button type='submit' class='btn btn-success btn-block'><span class='glyphicon glyphicon-off'></span>Login</button>";
  echo "</form>";
  echo "</div>";
  echo "<div class='modal-footer'>";
  echo "<button type='button' class='btn btn-danger btn-default pull-left' btn-class = 'close' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Cancel</button>";
  echo "<p>Not a member? <a href='signUp.php'>Sign Up</a></p>";
  echo "</div>";
  echo "</div>";
  echo "</ul>";
  echo "</div>";
  echo "</div>";
  echo "</nav>";
}

function adminbar() {
  echo "<nav class='navbar navbar-inverse'>";
  echo "<div class='container-fluid'>";
  echo "<div class='navbar-header'>";
  echo "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>";
  echo "<span class='icon-bar'></span>";
  echo "<span class='icon-bar'></span>";
  echo "<span class='icon-bar'></span>";
  echo "</button>";

  echo "</div>";
  echo "<div class='collapse navbar-collapse' id='myNavbar'>";
  echo "<ul class='nav navbar-nav'>";
  echo "<li class='active'><a href='homepage.php'>Home</a></li>";
  echo "<li class='active'><a href='eventsuser.php'>Events</a></li>";

  echo "<li class ='dropdown'>";
  echo "<a class= 'dropdown-toggle' data-toggle='dropdown' hred='#'> About Us";
  echo "<span class = 'caret'></span></a>";
  echo "<ul class='dropdown-menu'>";
  echo "<li><a href='About.php'>About Us</a></li>";
  echo "<li><a href='#'>FAQ</a></li>";
  echo "</ul>";

  echo "<li class ='dropdown'>";
  echo "<a class= 'dropdown-toggle' data-toggle='dropdown' hred='#'> Contact us";
  echo "<span class = 'caret'></span></a>";
  echo "<ul class='dropdown-menu'>";
  echo "<li><a href='Contactus.php'>Contact us Online</a></li>";
  echo "<li><a href='#'>Find our Location</a></li>";
  echo "</ul>";

  echo "</ul>";



  echo "<ul class='nav navbar-nav navbar-right'>";
  echo "<li><a href='SignupR.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
  echo"<li>'</li> ";
  echo"</ul>";

}


?>
