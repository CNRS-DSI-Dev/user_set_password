<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2015 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Set_Password;

use \OCA\User_Set_Password\App\User_Set_Password;
use \OCA\User_Set_Password\Lib\Helper;

$app = new User_Set_Password;
$c = $app->getContainer();

/**
 * Load js and css
 */
\OCP\Util::addStyle($c->query('AppName'), 'colorbox');
\OCP\Util::addScript($c->query('AppName'), 'jquery.colorbox');
\OCP\Util::addScript("core", 'jquery-showpassword');
\OCP\Util::addscript($c->query('AppName'), 'setpassword');

\OCP\Util::addStyle($c->query('AppName'), 'setpassword');

if (\OCP\User::isLoggedIn() and Helper::isEnabled()) {
    \OC_Util::addVendorScript('strengthify/jquery.strengthify');
    \OC_Util::addVendorStyle('strengthify/strengthify');
    // \OC_Util::addScript( '3rdparty', 'chosen/chosen.jquery.min' );
    // \OC_Util::addStyle( '3rdparty', 'chosen/chosen' );

    \OCP\Util::addScript($c->query('AppName'), 'activate');
}
