<?php 
	if($_POST['sb_hidden'] == 'Y') {
		$sb_room_name = $_POST['sb_room_name'];
		$sb_minimized = isset($_POST['sb_minimize']);
		if($sb_minimized==1){
			$sb_minimized_flag = 'checked';
			update_option('sb_minimized',1);		
		}
		else {
			update_option('sb_minimized',0);		
		}
		update_option('sb_room_name', $sb_room_name);
?>
		<div class="updated"><p><strong>Options Updated</strong></p></div>
<?php
	} else {
		$sb_room_name = get_option('sb_room_name');
		$sb_minimized = get_option('sb_minimized');
		if($sb_minimized==1){
			$sb_minimized_flag = 'checked';
		}
	}
?>
	
<div class="wrap">
	<h2> Scrollback Plugin Options</h2>
	
	<form name="sb_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="sb_hidden" value="Y">
		<p>Room Name: <input type="text" name="sb_room_name" value="<?php echo $sb_room_name; ?>" size="18"> <a href="http://scrollback.io/" target='_blank'>Don't have a room?</a></p>
		
		<p><b>Note: </b> <i> Changing or updating the room name may result in a new room creation, you will not see the older messages.</i></p>
		<br />
		<p>Minimize Chat Widget On Page Load: <input type="checkbox" name="sb_minimize" value="minimize" <?php echo $sb_minimized_flag; ?>></p>
		<input type="submit" name="Submit" value="Save" />
	</form>
</div>
