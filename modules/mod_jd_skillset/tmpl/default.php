<?php
// No direct access
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
if ($params->get('load_fontawesome', 1)) {
	$doc->addStyleSheet('https://use.fontawesome.com/releases/v5.15.1/css/all.css');
}
$doc->addStyleSheet(JURI::root() . 'media/mod_jd_skillset/css/mod_jd_skillset.css');
$doc->addStyleSheet(JURI::root() . 'media/mod_jd_skillset/css/jdgrid.min.css');

$skillsets = $params->get('skillsets', []);
$numberPosition = $params->get('numberPosition', 'above');
$symbolPosition = $params->get('symbolPosition', 'default');
$numberColor = $params->get('numberColor', '');

$titleColor = $params->get('titleColor', '');
$numberColor = $params->get('numberColor', '');
$symbolColor = $params->get('symbolColor', '');
$iconColor = $params->get('iconColor', '');

$titleSize = $params->get('titleSize', 20);
$numberSize = $params->get('numberSize', 40);
$symbolSize = $params->get('symbolSize', 40);
$iconSize = $params->get('iconSize', 52);

$customsStyle = $params->get('customsStyle');
$customsStyle = $params->get('customsStyle');
$i = 0;
foreach ($skillsets as $skillset) {
	$i++;
}
if ($i == 1) {
	$count = 12;
} elseif ($i == 2) {
	$count = 6;
} elseif ($i == 3) {
	$count = 4;
} elseif ($i == 4) {
	$count = 3;
}
?>
<style>
	<?php foreach ($skillsets as $index => $skillset) : ?>
	<?php if ($customsStyle) { ?>#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .counter-title {
		font-size: <?php echo $titleSize; ?>px;
	}

	#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .counter-number .count {
		font-size: <?php echo $numberSize; ?>px;
	}

	#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .counter-number .symbol {
		font-size: <?php echo $symbolSize; ?>px;
	}

	#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .count-icon {
		font-size: <?php echo $iconSize; ?>px;
	}

	<?php } ?><?php if ($customsStyle) { ?>#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .counter-title {
		color: <?php echo $titleColor; ?>;
	}

	#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .counter-number .count {
		color: <?php echo $numberColor; ?>;
	}

	#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .counter-number .symbol {
		color: <?php echo $symbolColor; ?>;
	}

	#skillset-<?php echo $index; ?>-<?php echo $module->id; ?> .count-icon {
		color: <?php echo $iconColor; ?>;
	}

	<?php } ?>
	<?php endforeach; ?>
</style>
<div id="jd_skillset<?php echo $module->id; ?>" class="jd-row counter-sub-container skillset-not-counted <?php if ($params->get('IconPosition') == 'left') echo 'jd-icon-position-left'; ?><?php if ($params->get('IconPosition') == 'right') echo 'jd-icon-position-right'; ?> ">
	<?php foreach ($skillsets as $index => $skillset) : ?>
		<div class="jd-col-12 jd-col-md-6 jd-col-lg-<?php echo $count; ?>" id="skillset-<?php echo $index; ?>-<?php echo $module->id; ?>">
			<div class="counter-wrapper">
				<?php if ($params->get('IconPosition') == 'top' or $params->get('IconPosition') == 'right' or $params->get('IconPosition') == 'left') { ?>
					<?php if ($skillset->skillset_icon_option == 'upload') { ?>
						<?php if (!empty($skillset->skillset_icon_upload)) { ?>
							<div class="counter-icon">
								<img src="<?php echo $skillset->skillset_icon_upload; ?>" alt="<?php echo $skillset->skillset_title; ?>"></img>
							</div>
						<?php } ?>
					<?php } elseif ($skillset->skillset_icon_option == 'icon') { ?>
						<?php if (!empty($skillset->skillset_icon_icon)) { ?>
							<div class="counter-icon">
								<i class="<?php echo $skillset->skillset_icon_icon; ?> count-icon" alt="icon"></i>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				<?php if (!empty($skillset->skillset_title) or !empty($skillset->skillset_number)) { ?>
					<div class="counter-text-container">
						<?php if ($numberPosition == 'above') { ?>
							<?php if (!empty($skillset->skillset_number)) { ?>
								<p class="counter-number">
									<span class="count"><?php echo $skillset->skillset_number; ?></span>
									<?php
									if (($skillset->skillset_enable_symbol)) { ?>
										<span>
											<?php $symbolTag = $symbolPosition == 'default' ? 'span' : $symbolPosition; ?>
											<<?php echo $symbolTag; ?> class="symbol">
												<?php echo $skillset->skillset_symbol; ?>
											</<?php echo $symbolTag; ?>>
										</span>
									<?php } ?>
								</p>
							<?php } ?>
						<?php } ?>
						<?php if (!empty($skillset->skillset_title)) { ?>
							<p class="counter-title"><?php echo $skillset->skillset_title; ?></p>
						<?php } ?>

						<?php if ($numberPosition == 'below') { ?>
							<?php if (!empty($skillset->skillset_number)) { ?>
								<p class="counter-number">
									<span class="count"><?php echo $skillset->skillset_number; ?></span>
									<?php
									if (($skillset->skillset_enable_symbol)) { ?>
										<span>
											<span>
												<?php $symbolTag = $symbolPosition == 'default' ? 'span' : $symbolPosition; ?>
												<<?php echo $symbolTag; ?> class="symbol">
													<?php echo $skillset->skillset_symbol; ?>
												</<?php echo $symbolTag; ?>>
											</span>
										</span>
									<?php } ?>
								</p>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if ($params->get('IconPosition') == 'bottom') { ?>
					<?php if ($skillset->skillset_icon_option == 'upload') { ?>
						<?php if (!empty($skillset->skillset_icon_upload)) { ?>
							<div class="counter-icon">
								<img src="<?php echo $skillset->skillset_icon_upload; ?>" alt="<?php echo $skillset->skillset_title; ?>"></img>
							</div>
						<?php } ?>
					<?php } elseif ($skillset->skillset_icon_option == 'icon') { ?>
						<?php if (!empty($skillset->skillset_icon_icon)) { ?>
							<div class="counter-icon">
								<i class="<?php echo $skillset->skillset_icon_icon; ?> count-icon" alt="icon"></i>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php if ($params->get('load_jquery', 1)) { ?>
	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<?php } ?>
<script>
	(function($) {
		// Skillset Number Counter
		var initskillsetcounter = function(_element) {
			$(_element).find('.count').each(function() {
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					duration: 3000,
					easing: 'swing',
					step: function(now) {
						$(this).text(Math.ceil(now));
					}
				});
			});
		};

		var elementInViewport = function(element) {
			var _this = element;
			var _this_top = _this.offset().top;
			return (_this_top <= window.pageYOffset + parseInt(window.innerHeight)) && (_this_top >= window.pageYOffset);
		};
		var winScroll = function() {
			var _element = $('#jd_skillset<?php echo $module->id; ?>.skillset-not-counted');
			if (typeof _element != 'undefined' && _element.length != 0 && elementInViewport(_element)) {
				$(_element).removeClass('skillset-not-counted');
				initskillsetcounter(_element);
			}
		};
		$(window).scroll(winScroll);
	})(jQuery);
</script>