<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform uk-form">
		<div class="uk-form-icon">
	    	<i class="uk-icon-search"></i>
	    	<input type="text" name="s" value="<?php esc_html_e('To search type and hit enter', 'megastar') ?>" onfocus="if(this.value=='<?php esc_html_e('To search type and hit enter', 'megastar') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_html_e('To search type and hit enter', 'megastar') ?>';" autocomplete="off" class="uk-form-width-large uk-form-large" />
	    	</div>
	<input type="submit" value="<?php esc_html_e('Search', 'megastar') ?>" class="uk-button uk-button-primary uk-button-large uk-contrast" />
</form>