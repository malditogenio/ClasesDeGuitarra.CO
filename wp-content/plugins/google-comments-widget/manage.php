<div style="margin:20px 0 0 10px;">

<?php
// Processing an option submit form. Set global vars from the form values.
if( isset($_POST['updateoptions'])  && $_POST['updateoptions']==1) {
	update_option( 'GOOGLEPLUSCOMMENTS-WIDTH', $_POST['width'] );

	if ( ! (is_numeric(get_option('GOOGLEPLUSCOMMENTS-WIDTH')) && get_option('GOOGLEPLUSCOMMENTS-WIDTH')> 0)) {
		update_option( 'GOOGLEPLUSCOMMENTS-WIDTH', 500 );
	}
	
	if( isset($_POST['credit'])  && $_POST['credit']==1) {
		update_option( 'GOOGLEPLUSCOMMENTS-CREDITS', 1 );
	} else {
		update_option( 'GOOGLEPLUSCOMMENTS-CREDITS', 0 );
	}

	if( isset($_POST['dynamicwidth'])  && $_POST['dynamicwidth']==1) {
		update_option( 'GOOGLEPLUSCOMMENTS-DYNAMICWIDTH', 1 );
	} else {
		update_option( 'GOOGLEPLUSCOMMENTS-DYNAMICWIDTH', 0 );
	}

	if( isset($_POST['hidecomments'])  && $_POST['hidecomments']==1) {
		update_option( 'GOOGLEPLUSCOMMENTS-HIDECOMMENTS', 1 );
	} else {
		update_option( 'GOOGLEPLUSCOMMENTS-HIDECOMMENTS', 0 );
	}

	if( isset($_POST['retainoldcomments'])  && $_POST['retainoldcomments']==1) {
		update_option( 'GOOGLEPLUSCOMMENTS-RETAINOLDCOMMENTS', 1 );
	} else {
		update_option( 'GOOGLEPLUSCOMMENTS-RETAINOLDCOMMENTS', 0 );
	}
}
?>
<form method="POST"  action="?page=googlepluscomments">
<table>
	<tr>
		<td style="text-align:center;" colspan="2"><h2 style="padding: 10px 0; text-decoration:underline;"><span style="color:#0047f1;">G</span><span style="color:#de0c32;">o</span><span style="color:#bc8000;">o</span><span style="color:#0047f1;">g</span><span style="color:#00b018;">l</span><span style="color:#dd172c;">e</span>+ Comments Options</h2></td>
	</tr>
	<tr>
		<td style="text-align:right;">Width:&nbsp;</td>
		<td style="padding:10px 5px;"><input type="text" name="width"  <?php if(get_option('GOOGLEPLUSCOMMENTS-DYNAMICWIDTH') == 1){ echo "readonly"; } ?> value="<?php echo get_option('GOOGLEPLUSCOMMENTS-WIDTH')?>" />
	</tr>
	<tr>
		<td style="text-align:right;">Dynamic Width:&nbsp;</td>
		<td style="padding:10px 5px;"><input type="checkbox" name="dynamicwidth" <?php if(get_option('GOOGLEPLUSCOMMENTS-DYNAMICWIDTH') == 1){echo "checked=\"checked\"";} ?> value="1" /> <i> [Fixes Google+ comment bug for responsive sites]</i></td>
	</tr>
	<tr>
		<td style="text-align:right;">Number of Comments to show:&nbsp;</td>
		<td style="padding:10px 5px;"><input type="text" name="commentstoshow" disabled="disabled" "readonly"; value="" /> <i>[Upcoming Feature]</i>
	</tr>
	<tr>
		<td style="text-align:right;">Retain Old Comments:&nbsp;</td>
		<td style="padding:10px 5px;"><input type="checkbox" name="retainoldcomments" <?php if(get_option('GOOGLEPLUSCOMMENTS-RETAINOLDCOMMENTS') == 1){echo "checked=\"checked\"";} ?> value="1" /> </td>
	</tr>
	<tr>
		<td style="text-align:right;">Hide Comments:&nbsp;</td>
		<td style="padding:10px 5px;"><input type="checkbox" name="hidecomments" <?php if(get_option('GOOGLEPLUSCOMMENTS-HIDECOMMENTS') == 1){echo "checked=\"checked\"";} ?> value="1" /> <i>[Comments will be visible on clicking a "Show Comments" link.]</i></td>
	</tr>
	<tr>
		<td style="text-align:right;">Show Credit:&nbsp;</td>
		<td style="padding:10px 5px;"><input type="checkbox" name="credit" <?php if(get_option('GOOGLEPLUSCOMMENTS-CREDITS') == 1){echo "checked=\"checked\"";} ?> value="1" /></td>
	</tr>
	<tr>
		<td style="text-align:right; padding:20px 0 0 0;">
			<input type="hidden" name="updateoptions" value="1" />
			<input type="submit" name="Submit" value="Submit" />
		</td>
		<td></td>
	</tr>
</table>

</form>
</div>
