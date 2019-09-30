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
	if(empty($ssc_gpa) or empty($ssc_pass_year) or empty($hsc_gpa) or empty($hsc_pass_year) or empty($group) or empty($versity_type)) {
		echo "All fields are required.";
	} else {
		$check = $db->query("SELECT * FROM subjects WHERE req_ssc_gpa <= '$ssc_gpa' and req_hsc_gpa <= '$hsc_gpa' and req_ssc_pass_year <= '$ssc_pass_year' and req_hsc_pass_year <= '$hsc_pass_year' and group = '$group' ORDER BY id");
		if($check) echo "yaa";
		if($check->num_rows>0) {
		$row = $check->fetch_assoc();
		}
		//echo $row[id];

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
  <style type="text/css">
    html, body {
		  height: 100%;
		}


@media (min-width:992px) {

}

@media (max-width:992px) {

}

#push.pin-top {
    position:relative;
    top: 0;
    width: 100%;
    height: 100%;
}

section.pin-top {
    position: fixed;
    width: 100%;
    z-index:99;
}

section.pinned {
    display:none;
    z-index:1;
}

#push.pinned {
    position: static;
    width: 100%;
    display:none;
}

section {
    height: 100%;
    width: 100%;
    min-height: 100%;
    position: fixed;
    top:0;
}

#push {
    position:relative;
    height: 100%;
}

#main {
    background-color:white;
    position:relative;
    z-index:990;
}
      </style>
    </head>

    <body>


<div id="nav">
  <div class="navbar-fixed">
    <nav class="blue-grey darken-4">
      <div class="nav-wrapper container">
        <a href="#!" class="brand-logo">UAG</a>
     	</div>
    </nav>
  </div>
</div>

<!-- main content -->
<div class="white lighten-5 valign-wrapper" style="margin-top: 50px;">
  <div class="container valign">
      <div class="row">
<?php
	if(isset($_POST['btn_search'])) {
		echo $ssc_gpa.' ';
		echo $ssc_pass_year.' ';
		echo $hsc_gpa.' ';
		echo $hsc_pass_year.' ';
		echo $group.' ';
		echo $versity_type.' ';
	}
?>
      <form action="" method="POST">
	      <div class="input-field col s12 m6">
	        <input name="ssc_gpa" id="ssc_gpa" type="number" class="validate">
	        <label for="ssc_gpa">SSC GPA</label>
	      </div>
	      <div class="input-field col s12 m6">
	        <select name="ssc_pass_year" id="ssc_pass_year" type="text">
			      <option value="" disabled>SSC Passing Year</option>
			      <option value="2016" selected>2016</option>
			      <option value="2015">2015</option>
			      <option value="2014">2014</option>
			      <option value="2013">2013</option>
			      <option value="2012">2012</option>
			      <option value="2011">2011</option>
			      <option value="2010">2010</option>
			    </select>
	    		<label>SSC Passing Year</label>
	      </div>
	      <div class="input-field col s12 m6">
	        <input name="hsc_gpa" id="hsc_gpa" type="number" class="validate">
	        <label for="hsc_gpa">HSC GPA</label>
	      </div>
	      <div class="input-field col s12 m6">
	        <select name="hsc_pass_year" id="hsc_pass_year" type="text">
		      <option value="" disabled>HSC Passing Year</option>
		      <option value="2014" selected>2014</option>
		      <option value="2013">2013</option>
		      <option value="2012">2012</option>
		      <option value="2011">2011</option>
		      <option value="2010">2010</option>
		    </select>
	  		<label>HSC Passing Year</label>
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
	      	<button type="submit" class="waves-effect waves-light btn" name="btn_search">Search</button>	
	    	</div>
    	</form>
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