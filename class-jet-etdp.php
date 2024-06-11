<?php
/**
 * Class Jet_Engine_Twig_Dynamic_Popup
 *
 * @class Jet_Engine_Twig_Dynamic_Popup
 * @package jet-engine-twig-dynamic-popup
 */

defined( 'ABSPATH' ) || exit;

class Jet_Engine_Twig_Dynamic_Popup {
	/**
	 * Constructor
	 *
	 * Sets up actions and filters.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_plugin_scripts' ) );
		add_filter( 'jet-popup/ajax-request/post-data', array( $this, 'filter_jetpopup_ajax_request_data' ) );
	}

	/**
	 * Enqueue Plugin Scripts
	 *
	 * Enqueues the Main JavaScript file.
	 */
	public function enqueue_plugin_scripts() {
		wp_enqueue_script( JET_ETDP_PLUGIN_PUBLIC_PREFIX . 'main', JET_ETDP_PLUGIN_URL . '/assets/js/main.js', array( 'jquery' ), JET_ETDP_VERSION, true );
	}

	/**
	 * Filter JetPopup AJAX Request Data
	 *
	 * Filter callback to modify post data and update superglobal variables.
	 *
	 * @param array $data The data from the AJAX request.
	 * @return array The modified data.
	 */
	public function filter_jetpopup_ajax_request_data($data) {
		if (isset($data['objectId']) && isset($data['objectType'])) {
			$object_id = sanitize_text_field($data['objectId']);
			$object_type = sanitize_text_field($data['objectType']);
			$taxonomy = isset($data['taxonomy']) ? sanitize_text_field($data['taxonomy']) : null;

			$_GET['queried_object_id'] = $object_id;
			$_REQUEST['queried_object_id'] = $object_id;

			$object = null;
			switch ($object_type) {
				case 'user':
					$object = get_user_by('id', $object_id);
					break;
				case 'post':
					$object = get_post($object_id);
					break;
				case 'term':
					if ($taxonomy) {
						$object = get_term_by('id', $object_id, $taxonomy);
					}
					break;
				case 'comment':
					$object = get_comment($object_id);
					break;
			}

			if ($object) {
				jet_engine()->listings->data->set_current_object($object, true);
			}
		}
		return $data;
	}
}

new Jet_Engine_Twig_Dynamic_Popup();