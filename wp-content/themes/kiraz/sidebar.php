<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( kiraz_has_sidebar() && is_active_sidebar( kiraz_sidebar_id() ) ): ?>
		<aside class="main-sidebar">
			<div class="main-sidebar-inner">
				<?php dynamic_sidebar( kiraz_sidebar_id() ) ?>
			</div>
		</aside>
		<!-- /.sidebar -->
	<?php endif ?>
