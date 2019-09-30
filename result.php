<?php
	ob_start();
	session_start();
	//error_reporting(0);
	$db = new mysqli('localhost', 'alamin', 'alamin', 'uag');
	//$db = new mysqli('localhost', 'uagbd_alamin', 'alamin', 'uagbd_alamin');
	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}
	$db->set_charset("utf8");

	function get_univ_name($sub_init,$versity_type){
		global $db,$name;
		$get_univ_list = $db->query("SELECT * FROM univ_list WHERE init = '$sub_init' and univ_type = '$versity_type' ORDER BY id");
			if($get_univ_list->num_rows>0) {
				$univ_list_row = $get_univ_list->fetch_assoc();
				//echo $univ_list_row['name'];
				$name = $univ_list_row['name'];
			}

			return $name;
	}

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



<?php



	if(empty($ssc_gpa) or empty($ssc_pass_year) or empty($hsc_gpa) or empty($hsc_pass_year) or empty($group) or empty($versity_type)) {
		echo "All fields are required.";
	} else {




		if(isset($_POST['btn_search'])) {
			echo "<h5> Your Informations:</h5> <br />";
			echo 'SSC GPA: '.$ssc_gpa.'<br />';
			echo 'SSC Pass year: '.$ssc_pass_year.'<br />';
			echo 'HSC GPA: '.$hsc_gpa.'<br />';
			echo 'HSC Pass year: '.$hsc_pass_year.'<br />';
			echo 'Group: '.$group.'<br />';
			//echo 'SSC GPA: '.$versity_type.' ';
			echo "<h5> Your Avilable University:</h5> <br />";
		}



	}
?>




<?php
if(isset($_POST['btn_search'])) {
$check_sub = $db->query("SELECT * FROM subjects WHERE req_ssc_gpa <= '$ssc_gpa' and req_hsc_gpa <= '$hsc_gpa' and req_ssc_pass_year <= '$ssc_pass_year' and req_hsc_pass_year <= '$hsc_pass_year' and group_type = '$group' and univ_type = '$versity_type' ORDER BY id");
	
		if($check_sub->num_rows>0) {
			echo ' <table class="bordered striped highlight ">
        <thead>
          <tr>
              <th>Name</th>
              <th>University</th>
              <th>Details</th>
          </tr>
        </thead>

        <tbody>';
			while ($sub_row = $check_sub->fetch_assoc()){
				$sub_init = $sub_row['init'];
			echo '<tr>
            <td>'.$sub_row['name'].'</td>
            <td>'.get_univ_name($sub_init,$versity_type).'</td>
            <td>View Attachment</td>
          </tr>';
				
				
			}
			echo "
        </tbody>
      </table>";
		} else {
	echo "Sorry! You have no avilable University.";
}
} 
?>


    </div>
  </div>
</div>



<footer class="page-footer blue-grey darken-2">
          <div class="container hide-on-small-only">
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