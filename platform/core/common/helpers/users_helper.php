<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Ivan Tcholakov <ivantcholakov@gmail.com>, 2014
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

if (!function_exists('display_user')) {

    function display_user($user_id, $photo_size = null) {

        $ci = get_instance();
        $ci->load->model('users');
        $ci->load->model('user_photo');

        $user_id = (int) $user_id;
        $photo_size = (int) $photo_size;

        if ($photo_size <= 0) {
            $photo_size = 24;
        }

        $user = $ci->users->with_deleted()->get($user_id);

        if (empty($user)) {
            return null;
        }

        return '<img src="'.$ci->user_photo->get($user, $photo_size).'" /> '.
            $user['first_name'].' '.$user['last_name'].' ('.$user['username'].')';
    }

}