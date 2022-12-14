<?php
//about theme info
add_action( 'admin_menu', 'multivendor_marketplace_gettingstarted' );
function multivendor_marketplace_gettingstarted() {
	add_theme_page( esc_html__('About Multivendor Marketplace', 'multivendor-marketplace'), esc_html__('About Multivendor Marketplace', 'multivendor-marketplace'), 'edit_theme_options', 'multivendor_marketplace_guide', 'multivendor_marketplace_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function multivendor_marketplace_admin_theme_style() {
	wp_enqueue_style('multivendor-marketplace-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('multivendor-marketplace-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'multivendor_marketplace_admin_theme_style');

//guidline for about theme
function multivendor_marketplace_mostrar_guide() { 
	//custom function about theme customizer
	$multivendor_marketplace_return = add_query_arg( array()) ;
	$multivendor_marketplace_theme = wp_get_theme( 'multivendor-marketplace' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Multivendor Marketplace', 'multivendor-marketplace' ); ?> <span class="version"><?php esc_html_e( 'Version', 'multivendor-marketplace' ); ?>: <?php echo esc_html($multivendor_marketplace_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','multivendor-marketplace'); ?></p>
    </div>
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="multivendor_marketplace_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'multivendor-marketplace' ); ?></button>
			<button class="tablinks" onclick="multivendor_marketplace_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'multivendor-marketplace' ); ?></button>
		</div>

		<?php
			$multivendor_marketplace_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$multivendor_marketplace_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Multivendor_Marketplace_Plugin_Activation_Settings::get_instance();
				$multivendor_marketplace_actions = $plugin_ins->recommended_actions;
				?>
				<div class="multivendor-marketplace-recommended-plugins">
				    <div class="multivendor-marketplace-action-list">
				        <?php if ($multivendor_marketplace_actions): foreach ($multivendor_marketplace_actions as $key => $multivendor_marketplace_actionValue): ?>
				                <div class="multivendor-marketplace-action" id="<?php echo esc_attr($multivendor_marketplace_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($multivendor_marketplace_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($multivendor_marketplace_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($multivendor_marketplace_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','multivendor-marketplace'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($multivendor_marketplace_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'multivendor-marketplace' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Multivendor ecommerce is a theme built on an elementor page builder. It is a sophisticated theme ideal for fashion stores, clothing stores, baby shops, dress stores, sportswear, fashion multivendor, fashion Woocommerce, marketplace, multivendor, jewelry stores, watches stores, multi vendor, fashion product, and online clothing products websites. Key features of this theme are Multipurpose, minimal, Expert, elegant, sophisticated, Clean designs, Retina ready, user-friendly, responsive to all devices, and beautiful pages. The theme is integrated with the Woocommerce plugin, which is a powerful as well as free plugin. Create a beautiful eCommerce website with every necessary feature. It also has a one-click demo importer, which means users can simply import full demo content with a few clicks of the mouse. Moreover, the theme is fully responsive and Retina-ready, so this eCommerce theme can be operated for any device. Let it be a desktop, tablet, or mobile phone, it is compatible with every device. Multivendor e-commerce is a platform that allows multiple businesses to sell their products through a single online store. This can be a great option for businesses that want to reach a larger audience or that dont have the resources to set up their own online store.','multivendor-marketplace'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'multivendor-marketplace' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'multivendor-marketplace' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MULTIVENDOR_MARKETPLACE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'multivendor-marketplace' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'multivendor-marketplace'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'multivendor-marketplace'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'multivendor-marketplace'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'multivendor-marketplace'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'multivendor-marketplace'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MULTIVENDOR_MARKETPLACE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'multivendor-marketplace'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'multivendor-marketplace'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'multivendor-marketplace'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MULTIVENDOR_MARKETPLACE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'multivendor-marketplace'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'multivendor-marketplace' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','multivendor-marketplace'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','multivendor-marketplace'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','multivendor-marketplace'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_best_seller_products_section') ); ?>" target="_blank"><?php esc_html_e('Best Selling Section','multivendor-marketplace'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','multivendor-marketplace'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','multivendor-marketplace'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','multivendor-marketplace'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','multivendor-marketplace'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','multivendor-marketplace'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','multivendor-marketplace'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','multivendor-marketplace'); ?></span><?php esc_html_e(' Go to ','multivendor-marketplace'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','multivendor-marketplace'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','multivendor-marketplace'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','multivendor-marketplace'); ?></span><?php esc_html_e(' Go to ','multivendor-marketplace'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','multivendor-marketplace'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','multivendor-marketplace'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','multivendor-marketplace'); ?> <a class="doc-links" href="<?php echo esc_url( MULTIVENDOR_MARKETPLACE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','multivendor-marketplace'); ?></a></p>
			  	</div>
			</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Multivendor_Marketplace_Plugin_Activation_Settings::get_instance();
			$multivendor_marketplace_actions = $plugin_ins->recommended_actions;
			?>
				<div class="multivendor-marketplace-recommended-plugins">
				    <div class="multivendor-marketplace-action-list">
				        <?php if ($multivendor_marketplace_actions): foreach ($multivendor_marketplace_actions as $key => $multivendor_marketplace_actionValue): ?>
				                <div class="multivendor-marketplace-action" id="<?php echo esc_attr($multivendor_marketplace_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($multivendor_marketplace_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($multivendor_marketplace_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($multivendor_marketplace_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'multivendor-marketplace' ); ?></h3>
				<hr class="h3hr">
				<div class="multivendor-marketplace-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','multivendor-marketplace'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'multivendor-marketplace' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','multivendor-marketplace'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','multivendor-marketplace'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','multivendor-marketplace'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','multivendor-marketplace'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=multivendor_marketplace_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','multivendor-marketplace'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','multivendor-marketplace'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

	</div>
</div>

<?php } ?>