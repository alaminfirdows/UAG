<?php
	ob_start();
	session_start();
	//error_reporting(0);
	$db = new mysqli('localhost', 'alamin', 'alamin', 'uag');
	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}
	$db->set_charset("utf8");

	if(isset($_POST['btn_search'])) {
		$ssc_gpa = $_POST['ssc_gpa'];
		$ssc_pass_year = $_POST['ssc_pass_year'];
		$hsc_gpa = $_POST['hsc_gpa'];
		$hsc_pass_year = $_POST['hsc_pass_year'];
		$group = $_POST['group'];
		$versity_type = $_POST['versity_type'];
	}
?>

<!DOCTYPE html>
<html>
  <head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>


<div id="nav">
  <div class="navbar-fixed">
    <nav class="blue-grey darken-4">
      <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo">UAG</a>
     	</div>
    </nav>
  </div>
</div>

<!-- main content -->
<div class="white lighten-5 valign-wrapper" style="margin-top: 50px;">
  <div class="container valign">
      <div class="row">
<?php $_SESSION['username'] = '';
	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	if ($username == 'admin' and $password == '1234' ) {
		$_SESSION['username'] = 'admin';
	} else {
		$_SESSION['username'] = '';
	}
	if(isset($_GET['logout']) == 1) {
		unset($_SESSION['username']);
		session_unset();
		session_destroy();
		header("Location: admin.php");
	}
?>
<?php
if(isset($_SESSION['username']) == '') { ?>
      <form action="" method="POST">
	      <div class="input-field col s12">
	        <input name="username" id="username" type="text" class="validate">
	        <label for="username">Username</label>
	      </div>
	      <div class="input-field col s12">
	        <input name="password" id="password" type="text" class="validate">
	        <label for="password">Password</label>
	      </div>
	      <div class="input-field col s12">
	        <button type="submit" class="waves-effect waves-light btn" name="login">Login</button>
	      </div>
	   </form>
<?php	} if(isset($_SESSION['username']) == 'admin') {

	?>
	<div class="row">
		<p> Hi, Admin.</p> <a href="admin.php?logout=1" class="waves-effect waves-light btn">Logout</a>
	</div>
	<form action="" method="POST">
	      <div class="input-field col s12  m6">
	        <input name="name" id="name" type="text" class="validate">
	        <label for="name">Subject Name</label>
	      </div>
	      <div class="input-field col s12  m6">
	        <input name="init" id="init" type="text" class="validate">
	        <label for="init">Versity Initial</label>
	      </div>
	      <div class="input-field col s12  m6">
	        <input name="req_ssc_gpa" id="req_ssc_gpa" type="text" class="validate">
	        <label for="req_ssc_gpa">Min SSC GPA</label>
	      </div>
	      <div class="input-field col s12  m6">
	        <input name="req_ssc_pass_year" id="req_ssc_pass_year" type="text" class="validate">
	        <label for="req_ssc_pass_year">Min SSC Year</label>
	      </div>
	      <div class="input-field col s12  m6">
	        <input name="req_hsc_gpa" id="req_hsc_gpa" type="text" class="validate">
	        <label for="req_hsc_gpa">Min HSC GPA</label>
	      </div>
	      <div class="input-field col s12  m6">
	        <input name="req_hsc_pass_year" id="req_hsc_pass_year" type="text" class="validate">
	        <label for="req_hsc_pass_year">Min SSC Year</label>
	      </div>
	      	      <div class="input-field col s12 m6">
	      	<select name="group" id="group" type="text">
			      <option value="" disabled>Group</option>
			      <option value="science" selected>Science</option>
			      <option value="arts">Arts</option>
			      <option value="commerce">Commerce</option>
			    </select>
		  		<label>Group</label>
	      </div>
	      <div class="input-field col s12 m6">
	      	<select name="versity_type" id="versity_type" type="number">
			      <option value="" disabled>Versity Type</option>
			      <option value="1" selected>Public</option>
			      <option value="2">Private</option>
			    </select>
		  		<label>Versity Type</label>
	      </div>
	      <div class="input-field col s12">
	        <button type="submit" class="waves-effect waves-light btn" name="add_sub">Add</button>
	      </div>
	   </form>
	   <?php } ?>
    </div>
  </div>
</div>


<footer class="page-footer blue-grey darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">UAG</h5>
                <p class="grey-text text-lighten-4"></p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Useful Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">&copy; 2017
            <a class="grey-text text-lighten-4 right" href="#!">Developed by UAG</a>
            </div>
          </div>
        </footer>



















		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<script type="text/javascript">
		  $(document).ready(function() {
		    $('select').material_select();
		    $(".button-collapse").sideNav();
				$('.modal-trigger').leanModal();
				$('#push,secton').pushpin({ top:$('#push').height() });
		    $(".button-collapse").sideNav();
		  });
		</script>
  </body>
  </html>