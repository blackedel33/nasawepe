<?php
/**
 * Template Name: Custom Registration
 * Template Post Type: post
 * @package WordPress
 * 
 * 
 */
get_header();
?>
<div class="wrapper">
	
	<?php
	$error= '';
	$success = '';
	
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	
	if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
		
		
		$password1 = $wpdb->escape(trim($_POST['password1']));
		$password2 = $wpdb->escape(trim($_POST['password2']));
		$email = $wpdb->escape(trim($_POST['email']));
		$username = $wpdb->escape(trim($_POST['username']));
		
		if( $email == "" || $password1 == "" || $password2 == "" || $username == ""  ) {
			$error= 'Please don\'t leave the required fields.';
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error= 'Invalid email address.';
		} else if(email_exists($email) ) {
			$error= 'Email already exist.';
		} else if($password1 <> $password2 ){
			$error= 'Password do not match.';		
		} else {
			
			$user_id = wp_insert_user( array ('user_pass' => apply_filters('pre_user_user_pass', $password1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'contributor' ) );
			if( is_wp_error($user_id) ) {
				$error= 'Error on user creation.';
			} else {
				do_action('user_register', $user_id);
				
				$success = 'You\'re successfully register';
			}
			
		}
		
	}
	?>
	
	<!--display error/success message-->

	
	<div id="content" class="site-content container">
		<ol class="breadcrumb" id="nasa_jsc_breadcrumbs"><li><a href="">Home</a> </li> <li class="active">Latest News</li></ol>		<div class="row">
			<div class="col-md-8 jsc-status">
				
			</div>
			<div class="col-md-4 search-wrap">
			
				<div class="form-group">
					<div class="col-md-10 col-sm-10 col-xs-10">
						<?php //get_search_form();?>
					</div>
					
				</div>
				
			</div>
		</div>

		


		<form method="post">


			<h3>Register Form</h3>
			<h5>Form Register With Role Contributor</h5>
						<div id="message">
			<?php 
				if(! empty($err) ) :
					echo '<p class="error">'.$err.'';
				endif;
				?>
				
				<?php 
				if(! empty($success) ) :
					echo '<p class="error">'.$success.'';
				endif;
				?>
		</div>

			<p><label>Email</label></p>
			<p><input type="text" value="" name="email" id="email" /></p>
			<p><label>Username</label></p>
			<p><input type="text" value="" name="username" id="username" /></p>
			<p><label>Password</label></p>
			<p><input type="password" value="" name="password1" id="password1" /></p>
			<p><label>Password again</label></p>
			<p><input type="password" value="" name="password2" id="password2" /></p>
			<div class="alignleft"><p><?php if($sucess != "") { echo $sucess; } ?> <?php if($error!= "") { echo $error; } ?></p></div>
			<button type="submit" name="btnregister" class="button" >Register</button>
			<input type="hidden" name="task" value="register" />
		</form>
	
	<?php
	get_footer();

	?>
	</div>

