<?php

// Disable wordpress editor
define('DISALLOW_FILE_EDIT', true);

// Manage menu 
function remove_menus()
{

	// remove_menu_page('index.php');                  //Dashboard
	// remove_menu_page('jetpack');                    //Jetpack* 
	// remove_menu_page('upload.php');                 //Media
	// remove_menu_page('edit.php?post_type=page');    //Pages
	// remove_menu_page('themes.php');                 //Appearance
	// remove_menu_page('plugins.php');                //Plugins
	// remove_menu_page('users.php');                  //Users
	// remove_menu_page('tools.php');                  //Tools
	// remove_menu_page('options-general.php');        //Settings
	// remove_menu_page('edit.php');                   //Posts
	remove_menu_page('edit-comments.php');             //Comments

}
add_action('admin_menu', 'remove_menus');

// Remove update submenu under dashboard
add_action('admin_init', 'remove_update_submenu');
function remove_update_submenu()
{
	global $submenu;
	unset($submenu['index.php'][10]);
}

//Custom logo admin
function my_login_logo()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			/*background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/wp-login.png); */
			background-size: 320px 65px;
			background-repeat: no-repeat;
			height: 65px;
			padding-bottom: 30px;
			width: 320px;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');
?>
