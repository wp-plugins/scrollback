<?php
/*
Plugin Name: Scrollback Chat
Plugin URI: http://www.scrollback.io
Description: Scrollback chat for your website and blog.
Author: Askabt Pte Ltd
Version: 0.3
Author URI: http://scrollback.io
*/

	function embed() {
		$streams = get_option('sb_room_name');
		$sb_minimized = get_option('sb_minimized');
?>

<script type='text/javascript'>
	var sb_minimize = <?php echo $sb_minimized; ?>;
	var sb_m_flag;
	if (sb_minimize===1) {
		sb_m_flag = true;
	}
	else {
		sb_m_flag = false;
	}
	window.scrollback = {
		streams: [<?php echo json_encode($streams); ?>],
		minimized:sb_m_flag,
		host:'https://scrollback.io'
	};
</script>
<script type='text/javascript' src='https://scrollback.io/client.min.js'> </script>

<?php
	}		
	
	function scrollback_admin() {
		include('sb_settings.php');
	}
	
	function scrollback_admin_actions() {
		add_options_page("Scrollback Settings","Scrollback Settings",1,"sb_settings.php","scrollback_admin");
	}	
	
add_action( 'admin_menu', 'scrollback_admin_actions');
add_action( 'wp_enqueue_scripts', 'embed' );
?>

