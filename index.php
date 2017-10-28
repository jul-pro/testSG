 <?php

require_once("config.php");
require 'captcha/rand.php';




// Set the session contents
$_SESSION['captcha_id'] = $str;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Softgroup Test</title>

	<!--CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/docs/3.3/examples/dashboard/dashboard.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	
	
	<style>
		#feedback {
			display: none;
		}
	</style>



</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Messages</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#" data-fancybox data-src="#feedback">Create message</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Messages</h2>
          <div class="table-responsive">
          	<table id="gbookmessages" class="table table-striped table-bordered" cellspacing="0" width="100%">
        		<thead>
            		<tr>
                		<th>Name</th>
                		<th>Email</th>
                		<th>Message</th>
                		<th>Date</th>
            		</tr>
        		</thead>
		        <tfoot>
		            <tr>
		                <th>Name</th>
		                <th>Email</th>
		                <th>Message</th>
		                <th>Date</th>
		            </tr>
		        </tfoot>
    		</table>
          </div>
        </div>
      </div>
    </div>
	<div id="feedback">
		<form id="message_form" class="form" method="post">
			<div class="form-group">
				<label for="u_name">Name</label>
				<input class="form-control" type="text" name="u_name" id="u_name">
			</div>
			<div class="form-group">
				<label for="u_email">E-Mail</label>
				<input class="form-control" name="u_email" id="u_email">
			</div>
			<div class="form-group">
				<label for="u_msg">Message</label>
				<textarea class="form-control" id="u_msg" name="u_msg"></textarea>
			</div>
			<div class="form-group">
				<div id="captchaimage">
				<a href="" id="refreshimg" title="Click to refresh image">
					<img src="captcha/images/image.php?<?php echo time(); ?>" width="132" height="46" alt="Captcha image">
				</a>
			</div>
			<label for="captcha">Enter the characters as seen on the image above (case insensitive):</label>
			<input class="form-control" type="text" maxlength="6" name="captcha" id="captcha">
			</div>
			
			
			<div class="form-group">
				<input class="btn btn-primary" id="submit" type="submit" value="Submit">
			</div>
		</form>
	</div>

	

	


	<!-- JS -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"
  		integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  		crossorigin="anonymous">
  	</script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/captcha.js"></script>
	<script type="text/javascript" src="js/validation.js"></script>
	<script type="text/javascript" src="js/my.js"></script>


</body>
</html>
