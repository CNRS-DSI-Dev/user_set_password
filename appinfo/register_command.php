<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2015 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

use \OCA\User_Set_Password\App\User_Set_Password;
use \OCA\User_Set_Password\Command\UspInit;
use \OCA\User_Set_Password\Command\UspReset;

$app = new User_Set_Password;
$c = $app->getContainer();

$application->add(new UspInit());
$application->add(new UspReset());
