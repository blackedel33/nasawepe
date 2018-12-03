<h1>Admin Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'admin-settings-group' ); ?>
	<?php do_settings_sections( 'admin_page' ); ?>
	<?php submit_button(); ?>
</form>