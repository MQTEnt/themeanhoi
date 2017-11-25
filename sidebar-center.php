<?php 
	if(is_active_sidebar('center-sidebar')):
		dynamic_sidebar('center-sidebar');
	else:
		_e("<h2 style='text-align:center; border: 1px solid red; padding: 20px; margin: 10px 5px'>
				This is center side, you need to add some widgets
			</h2>",
			'tmq');
	endif;
?>