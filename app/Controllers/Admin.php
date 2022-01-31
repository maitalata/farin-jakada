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
            //dd(phpinfo());
            echo view('templates/admin_header');
            echo view('admin/new_upload');
            echo view('templates/admin_footer');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function uploads()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            //dd(phpinfo());
            $data['uploads'] = $this->admin_model->getAllUploads();

            echo view('templates/admin_header', $data);
            echo view('admin/uploads');
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
     * Saves the submitted data from the new upload page, the function also handles
     * the file upload functionality and will rename the uploaded audio file and move
     * it to appropriate folder.
     *
     * @return void
     */
    public function save_upload()
    {
        helper(['form', 'url']);

        //Call the validation library
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                'category' => ['label' => 'Category', 'rules' => 'required'],
                'description' => ['label' => 'Description', 'rules' => 'required'],
                'uploaded_file' => [
                    'label' => 'Uploaded File',
                    'rules' => 'uploaded[uploaded_file]'
                    . '|mime_in[uploaded_file,audio/mpeg,audio/mp3]'
                    . '|max_size[uploaded_file,20000]',
                ]
            ]);

        if ($validation->withRequest($this->request)->run()) {

            $img = $this->request->getFile('uploaded_file');

            if (!$img->hasMoved()){
                //$filepath = WRITEPATH . 'uploads/users/' . $img->store();
                $total_uploads = $this->admin_model->getLastId();
                $total_uploads++;
                $newName = "upload_".$total_uploads. "_.mp3";
                $img->move(
                    'uploads/audio/', $newName);
            } else {
                $this->session->setFlashdata('errors', array('File cannot be moved'));
                return redirect()->to('admin/new_upload');
            }

            $data = [
                'category' => $this->request->getVar('category'),
                'description' => $this->request->getVar('description')
            ];   

            $this->admin_model->saveUpload($data);

            $this->session->setFlashdata('success', 'Item uploaded successfully');
            return redirect()->to('admin/new_upload');

        } else {
            $this->session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('admin/new_upload');
        }

    }

    /**
     * Admin logout function. The function will destroy all sessions using
     * session_destroy
     *
     * @return mixed
     */
    public function logout()
    {
        session_destroy();
        return redirect()->to('admin/login');
    }

}
