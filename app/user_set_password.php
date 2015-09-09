<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2015 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Set_Password\App;

use \OCP\AppFramework\App;
use \OCA\User_Set_Password\Controller\PageController;
use \OCA\User_Set_Password\Controller\RequestController;
use \OCA\User_Set_Password\Lib\Helper;

class User_Set_Password extends App {

    /**
     * Define your dependencies in here
     */
    public function __construct(array $urlParams=array()){
        parent::__construct('user_set_password', $urlParams);

        $container = $this->getContainer();

        /**
         * Controllers
         */
        $container->registerService('PageController', function($c){
            return new PageController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('L10N'),
                $c->query('UserId')
            );
        });

        $container->registerService('RequestController', function($c){
            return new RequestController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('L10N')
            );
        });

        /**
         * Core
         */
        $container->registerService('UserId', function($c) {
            return \OCP\User::getUser();
        });

        $container->registerService('L10N', function($c) {
            return $c->query('ServerContainer')->getL10N($c->query('AppName'));
        });
    }
}
