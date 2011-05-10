<?php
require_once('config.php');
/*
This is the footer file for the home page.
If you hit this file in the browser, you'll get the markup that should be pasted into the wrapper footer field of the BSD Tools admin.
*/
?>
   </div><!--/in-->
</section><!--/act-3-->
<?php include('moz-footer.php'); ?>
<?php if (function_exists('bsdtools_custom_fields_to_select_data')): ?>
<script type="text/javascript">
	jQuery(function($){
		<?php echo bsdtools_custom_fields_to_select_data(); ?>
		
		var buildSelect = function(name, options) {
			var _select = '<select name="' + name + '" id="' + name + '">';
			for (j in options) {
				_select += '<option value="' + j + '">' + options[j] + '</option>';
			}
			_select += '</select>';
			return $(_select);
		};

		// easy
		$('input[name="custom2"]').replaceWith(buildSelect('custom2', field_trans.custom2));
		// not-so-easy
		$('input[name="custom1"]')
			.after(buildSelect('custom1_size', field_trans.custom1_size))
			.after(buildSelect('custom1_fit', field_trans.custom1_fit))
			.replaceWith($('<input type="hidden" name="custom1" id="custom1" value="" />'));

		$('form#contribution').submit(function() {
			// grab custom field data and shoehorn it in to the hidden element
			$('#custom1').val($('#custom1_fit').val() + ' ' + $('#custom1_size').val());
			// prevent special modified fields from submitting
			$('#custom1_size, #custom1_fit').attr('disabled', 'disabled');
			return true;
		});
	});
</script>
<?php endif; ?>
</body> 
</html>