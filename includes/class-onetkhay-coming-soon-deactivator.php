<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://tiekuasare.com
 * @since      1.0.0
 *
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/includes
 * @author     Tieku Asare <nanakhay21@gmail.com>
 */
class Onetkhay_Coming_Soon_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$roles = ['administrator', 'editor'];
    	foreach ($roles as $role_name) {
        $role = get_role($role_name);
        if ($role) {
            $role->remove_cap('access_coming_soon_settings');
        }
    }

	}

}
