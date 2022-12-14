<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Multivendor_Marketplace_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'multivendor-marketplace-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'multivendor-marketplace' ),
				'family'      => esc_html__( 'Font Family', 'multivendor-marketplace' ),
				'size'        => esc_html__( 'Font Size',   'multivendor-marketplace' ),
				'weight'      => esc_html__( 'Font Weight', 'multivendor-marketplace' ),
				'style'       => esc_html__( 'Font Style',  'multivendor-marketplace' ),
				'line_height' => esc_html__( 'Line Height', 'multivendor-marketplace' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'multivendor-marketplace' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'multivendor-marketplace-ctypo-customize-controls' );
		wp_enqueue_style(  'multivendor-marketplace-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'multivendor-marketplace' ),
        'Abril Fatface' => __( 'Abril Fatface', 'multivendor-marketplace' ),
        'Acme' => __( 'Acme', 'multivendor-marketplace' ),
        'Anton' => __( 'Anton', 'multivendor-marketplace' ),
        'Architects Daughter' => __( 'Architects Daughter', 'multivendor-marketplace' ),
        'Arimo' => __( 'Arimo', 'multivendor-marketplace' ),
        'Arsenal' => __( 'Arsenal', 'multivendor-marketplace' ),
        'Arvo' => __( 'Arvo', 'multivendor-marketplace' ),
        'Alegreya' => __( 'Alegreya', 'multivendor-marketplace' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'multivendor-marketplace' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'multivendor-marketplace' ),
        'Bangers' => __( 'Bangers', 'multivendor-marketplace' ),
        'Boogaloo' => __( 'Boogaloo', 'multivendor-marketplace' ),
        'Bad Script' => __( 'Bad Script', 'multivendor-marketplace' ),
        'Bitter' => __( 'Bitter', 'multivendor-marketplace' ),
        'Bree Serif' => __( 'Bree Serif', 'multivendor-marketplace' ),
        'BenchNine' => __( 'BenchNine', 'multivendor-marketplace' ),
        'Cabin' => __( 'Cabin', 'multivendor-marketplace' ),
        'Cardo' => __( 'Cardo', 'multivendor-marketplace' ),
        'Courgette' => __( 'Courgette', 'multivendor-marketplace' ),
        'Cherry Swash' => __( 'Cherry Swash', 'multivendor-marketplace' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'multivendor-marketplace' ),
        'Crimson Text' => __( 'Crimson Text', 'multivendor-marketplace' ),
        'Cuprum' => __( 'Cuprum', 'multivendor-marketplace' ),
        'Cookie' => __( 'Cookie', 'multivendor-marketplace' ),
        'Chewy' => __( 'Chewy', 'multivendor-marketplace' ),
        'Days One' => __( 'Days One', 'multivendor-marketplace' ),
        'Dosis' => __( 'Dosis', 'multivendor-marketplace' ),
        'Droid Sans' => __( 'Droid Sans', 'multivendor-marketplace' ),
        'Economica' => __( 'Economica', 'multivendor-marketplace' ),
        'Fredoka One' => __( 'Fredoka One', 'multivendor-marketplace' ),
        'Fjalla One' => __( 'Fjalla One', 'multivendor-marketplace' ),
        'Francois One' => __( 'Francois One', 'multivendor-marketplace' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'multivendor-marketplace' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'multivendor-marketplace' ),
        'Great Vibes' => __( 'Great Vibes', 'multivendor-marketplace' ),
        'Handlee' => __( 'Handlee', 'multivendor-marketplace' ),
        'Hammersmith One' => __( 'Hammersmith One', 'multivendor-marketplace' ),
        'Inconsolata' => __( 'Inconsolata', 'multivendor-marketplace' ),
        'Indie Flower' => __( 'Indie Flower', 'multivendor-marketplace' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'multivendor-marketplace' ),
        'Julius Sans One' => __( 'Julius Sans One', 'multivendor-marketplace' ),
        'Josefin Slab' => __( 'Josefin Slab', 'multivendor-marketplace' ),
        'Josefin Sans' => __( 'Josefin Sans', 'multivendor-marketplace' ),
        'Kanit' => __( 'Kanit', 'multivendor-marketplace' ),
        'Lobster' => __( 'Lobster', 'multivendor-marketplace' ),
        'Lato' => __( 'Lato', 'multivendor-marketplace' ),
        'Lora' => __( 'Lora', 'multivendor-marketplace' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'multivendor-marketplace' ),
        'Lobster Two' => __( 'Lobster Two', 'multivendor-marketplace' ),
        'Merriweather' => __( 'Merriweather', 'multivendor-marketplace' ),
        'Monda' => __( 'Monda', 'multivendor-marketplace' ),
        'Montserrat' => __( 'Montserrat', 'multivendor-marketplace' ),
        'Muli' => __( 'Muli', 'multivendor-marketplace' ),
        'Marck Script' => __( 'Marck Script', 'multivendor-marketplace' ),
        'Noto Serif' => __( 'Noto Serif', 'multivendor-marketplace' ),
        'Open Sans' => __( 'Open Sans', 'multivendor-marketplace' ),
        'Overpass' => __( 'Overpass', 'multivendor-marketplace' ),
        'Overpass Mono' => __( 'Overpass Mono', 'multivendor-marketplace' ),
        'Oxygen' => __( 'Oxygen', 'multivendor-marketplace' ),
        'Orbitron' => __( 'Orbitron', 'multivendor-marketplace' ),
        'Patua One' => __( 'Patua One', 'multivendor-marketplace' ),
        'Pacifico' => __( 'Pacifico', 'multivendor-marketplace' ),
        'Padauk' => __( 'Padauk', 'multivendor-marketplace' ),
        'Playball' => __( 'Playball', 'multivendor-marketplace' ),
        'Playfair Display' => __( 'Playfair Display', 'multivendor-marketplace' ),
        'PT Sans' => __( 'PT Sans', 'multivendor-marketplace' ),
        'Philosopher' => __( 'Philosopher', 'multivendor-marketplace' ),
        'Permanent Marker' => __( 'Permanent Marker', 'multivendor-marketplace' ),
        'Poiret One' => __( 'Poiret One', 'multivendor-marketplace' ),
        'Quicksand' => __( 'Quicksand', 'multivendor-marketplace' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'multivendor-marketplace' ),
        'Raleway' => __( 'Raleway', 'multivendor-marketplace' ),
        'Rubik' => __( 'Rubik', 'multivendor-marketplace' ),
        'Rokkitt' => __( 'Rokkitt', 'multivendor-marketplace' ),
        'Russo One' => __( 'Russo One', 'multivendor-marketplace' ),
        'Righteous' => __( 'Righteous', 'multivendor-marketplace' ),
        'Slabo' => __( 'Slabo', 'multivendor-marketplace' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'multivendor-marketplace' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'multivendor-marketplace'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'multivendor-marketplace' ),
        'Sacramento' => __( 'Sacramento', 'multivendor-marketplace' ),
        'Shrikhand' => __( 'Shrikhand', 'multivendor-marketplace' ),
        'Tangerine' => __( 'Tangerine', 'multivendor-marketplace' ),
        'Ubuntu' => __( 'Ubuntu', 'multivendor-marketplace' ),
        'VT323' => __( 'VT323', 'multivendor-marketplace' ),
        'Varela Round' => __( 'Varela Round', 'multivendor-marketplace' ),
        'Vampiro One' => __( 'Vampiro One', 'multivendor-marketplace' ),
        'Vollkorn' => __( 'Vollkorn', 'multivendor-marketplace' ),
        'Volkhov' => __( 'Volkhov', 'multivendor-marketplace' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'multivendor-marketplace' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'multivendor-marketplace' ),
			'100' => esc_html__( 'Thin',       'multivendor-marketplace' ),
			'300' => esc_html__( 'Light',      'multivendor-marketplace' ),
			'400' => esc_html__( 'Normal',     'multivendor-marketplace' ),
			'500' => esc_html__( 'Medium',     'multivendor-marketplace' ),
			'700' => esc_html__( 'Bold',       'multivendor-marketplace' ),
			'900' => esc_html__( 'Ultra Bold', 'multivendor-marketplace' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'multivendor-marketplace' ),
			'normal'  => esc_html__( 'Normal', 'multivendor-marketplace' ),
			'italic'  => esc_html__( 'Italic', 'multivendor-marketplace' ),
			'oblique' => esc_html__( 'Oblique', 'multivendor-marketplace' )
		);
	}
}
