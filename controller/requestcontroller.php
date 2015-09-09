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
     * Create a request
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
