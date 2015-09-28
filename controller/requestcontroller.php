<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2015 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Set_Password\Controller;

use \OCP\AppFramework\APIController;
use \OCP\AppFramework\Http\JSONResponse;
use \OCP\IRequest;
use \OCP\IL10N;

use \OCA\User_Set_Password\lib\Helper;

class RequestController extends APIController
{
    protected $l;

    public function __construct($appName, IRequest $request, IL10N $l)
    {
        parent::__construct($appName, $request, 'GET, POST');
        $this->l = $l;
    }

    /**
     * Change the user password
     * @NoAdminRequired
     */
    public function changePassword()
    {
        \OC_JSON::callCheck();
        \OC_JSON::checkLoggedIn();

        $username = \OC_User::getUser();
        $password = isset($_POST['personal-password']) ? $_POST['personal-password'] : null;

        if (!is_null($password) && \OC_User::setPassword($username, $password)) {
            return array(
                'status' => 'success',
                'data' => array(
                    'msg' => $this->l->t('Password successfully created'),
                ),
            );
        } else {
            return array(
                'status' => 'error',
            );
        }
    }

    /**
     * Enable the display
     * @NoAdminRequired
     * @param string $file File path
     * @param int $version Allowed values are stored in appconfig "versions"
     * @param string $filetype
     */
    public function disable()
    {
        Helper::disable();

        return array(
            'status' => 'success',
            'data' => array(
                'msg' => $this->l->t('SetPassword successfully created'),
            ),
        );
    }
}
