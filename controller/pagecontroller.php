<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2015 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Set_Password\Controller;

use \OCP\AppFramework\Controller;
use \OCP\IRequest;
use \OCP\IL10N;

class PageController extends Controller
{
    protected $l;
    protected $userId;

    public function __construct($appName, IRequest $request, IL10N $l, $userId)
    {
        parent::__construct($appName, $request, 'GET');
        $this->l = $l;
        $this->userId = $userId;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index()
    {
        $params = array();
        $params['minlength']       = \OCP\CONFIG::getAppValue('password_policy', 'min_length', 15);
        $params['mixedCase']       = \OCP\CONFIG::getAppValue('password_policy', 'mixedcase', true);
        $params['numbers']         = \OCP\CONFIG::getAppValue('password_policy', 'numbers', true);
        $params['specialChars']    = \OCP\CONFIG::getAppValue('password_policy', 'specialcharacters', 1);
        $params['specialcharlist'] = \OCP\CONFIG::getAppValue('password_policy', 'specialcharslist', '');

        return $this->render('main', $params, 'blank');
    }
}
