<?php

/**
 * Fired during plugin activation
 *
 * @link       https://tiekuasare.com
 * @since      1.0.0
 *
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/includes
 * @author     Tieku Asare <nanakhay21@gmail.com>
 */
class Onetkhay_Coming_Soon_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$roles = ['administrator', 'editor'];
    	foreach ($roles as $role_name) {
        $role = get_role($role_name);
        if ($role) {
            $role->add_cap('access_coming_soon_settings');
        }
    }

	}

}
