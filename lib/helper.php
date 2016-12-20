<?php

/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2015 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Set_Password\Lib;

class Helper
{
    /**
    * @brief Disable the display
    */
    public static function enable()
    {
        \OCP\Config::setUserValue(\OCP\User::getUser(), 'user_set_password', 'show', 1);
    }

    /**
    * @brief Enable the display
    */
    public static function disable()
    {
        \OCP\Config::setUserValue(\OCP\User::getUser(), 'user_set_password', 'show', 0);
    }

    /**
     * Has the user already see the popup ?
     * @return array
     */
    public static function isEnabled()
    {
        $conf=\OCP\Config::getUserValue(\OCP\User::getUser(), 'user_set_password', 'show', 1);

        return ($conf==1);
    }
}
