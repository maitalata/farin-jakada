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
        if (isset($_SESSION['admin_logged_in'])) {
            echo view('templates/admin_header');
            echo view('admin/dashboard');
            echo view('templates/admin_footer');
        } else {
            return redirect()->to('admin/login');
        }
    }

    /**
     * Function that display the new upload page
     *
     * @return void
     */
    public function new_upload()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            echo view('templates/admin_header');
            echo view('admin/new_upload');
            echo view('templates/admin_footer');
        } else {
            return redirect()->to('admin/login');
        }
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

    /**
     * The function will check admin login and initialize sessions and redirects
     * accordingly when the admin credentials are correct, otherwise it will return
     * to login page and display error message.
     *
     * @return void
     */
    public function loginChecker()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $hash = $this->admin_model->getHashedPassword($email);
        $check_login = $this->admin_model->checkLogin($email);

        if ($check_login && password_verify($password, $hash)) {
            $admin_details = $this->admin_model->getAdminDetails($email);
            $this->session->set('current_adm9n', $email);
            $this->session->set(
                'current_admin_fullname',
                $admin_details->first_name . ' ' . $admin_details->last_name
            );
            $this->session->set('current_admin_id', $admin_details->id);

            $this->session->set('admin_logged_in', true);
            return redirect()->to('admin/');

        } else {
            $this->session->setFlashdata(
                'errors', [
                    'Incorrect Email or Password',
                ]);
            return redirect()->to('admin/login/');
        }
    }

    /**
     * Admin logout function. The function will destroy all sessions using
     *  session_destroy
     *
     * @return mixed
     */
    public function logout()
    {
        session_destroy();
        return redirect()->to('admin/login');
    }

}
