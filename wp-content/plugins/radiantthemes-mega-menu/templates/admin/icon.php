<div class="modal-box-icon">
	<div class="modal-header">
		<h1><?php _e( 'Select Icon', 'rt-megamenu' ); ?></h1>
		<span>
			<a class="modal-close-button close"><i class="dashicons dashicons-no-alt"></i></a>
		</span>
	</div>
	<div class="modal-content">

		<!-- start search form -->
		<form method="post" id="menu-icon-search-form" class="form-menu-icon-search">
			<input type="text" class="text-input" id="menu-icon-search" placeholder="Search Icon" />

			<select id="menu-icon-filter">
				<option value="">Show All</option>
				<?php foreach ( $filter as $key_word => $title ) : ?>
					<option value="<?php echo esc_attr( $key_word ); ?>"><?php echo esc_attr( $title ); ?></option>
				<?php endforeach; ?>
			</select>
		</form>
		<!-- end search form -->

		<!-- start filter form -->
		<form method="post" id="menu-icon-filter-form" class="form-menu-icon-filter">

		</form>
		<!-- end filter form -->

		<!-- start font awesome -->
		<div class="menu-icon-wrap">

			<?php foreach ( $web_app as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="web_app"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $spinner as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="spinner"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $transportation as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="transportation"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $gender as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="gender"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $file_type as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="file_type"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $form_control as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="form_control"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $payment as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="payment"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $currency as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="currency"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $text_editor as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="text_editor"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $directional as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="directional"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $video as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="video_player"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $brand as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="brand"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $medical as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="medical"></i>
				</label>
			<?php endforeach; ?>

			<?php foreach ( $chart as $value ) : ?>
				<label class="menu-icon-style">
					<input type="radio" name="menu_item_icon_show" value="fa <?php echo $value; ?>" />
					<i class="fa <?php echo $value; ?>" data-filter="chart"></i>
				</label>
			<?php endforeach; ?>

		</div>
		<!-- end font awesome -->

	</div>
	<div class="modal-footer">
		<button id="button_select_icon" class="button button-primary"><?php _e( 'Select', 'rt-megamenu' ); ?></button>
	</div>
</div>
<div class="modal-box-icon-overlay"></div>
