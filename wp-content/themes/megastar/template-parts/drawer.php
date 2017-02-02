<?php if (is_active_sidebar('drawer')) : ?>
<div class="drawer-wrapper">
	<div id="tm-drawer" class="tm-drawer">
		<div class="uk-container uk-container-center">
			<section class="uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
				<?php dynamic_sidebar('drawer'); ?>
			</section>
		</div>
	</div>
	<a href="javascript:void(0);" class="drawer_toggle"><span class="uk-icon-chevron-down"></span></a>
</div>
<?php endif; ?>