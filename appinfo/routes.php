<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Set_Password;

use \OCA\User_Set_Password\App\User_Set_Password;

$application = new User_Set_Password();
$application->registerRoutes($this, array(
    'routes' => array(
        // PAGE
        array(
            'name' => 'page#index',
            'url' => '/',
            'verb' => 'GET',
        ),
        // REQUEST API
        array(
            'name' => 'request#enable',
            'url' => '/api/1.0/enable',
            'verb' => 'GET',
        ),
        array(
            'name' => 'request#disable',
            'url' => '/api/1.0/disable',
            'verb' => 'GET',
        ),
        array(
            'name' => 'request#changepassword',
            'url' => '/api/1.0/changepassword',
            'verb' => 'POST',
        ),
    ),
));
