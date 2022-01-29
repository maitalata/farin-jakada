<?php

namespace App\Controllers;

/**
 * Admin Controller. Handles all administrators functions, such as login handler,
 * file upload, admin password changes and other functionalities
 * 
 * @category Controllers
 * @package  App\Controllers
 * @author   Umar Sunusi Maitalata <maitalata@gmail.com>
 * @license  MIT The MIT License (MIT)
 * @link     https://www.farinjakada.com
 */
class Admin extends BaseController
{
    /**
     * Index page. The function returns the admin dashboard.
     *
     * @return mixed
     */
    public function index()
    {
        echo view('admin/dashboard.php');
    }

    /**
     * Login page. The function returns the login page for the administrator's login.
     *
     * @return mixed
     */
    public function login()
    {
        echo view('admin/login');
    }
}
