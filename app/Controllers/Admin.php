<?php

namespace App\Controllers;

use App\Models\AdminModel;

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

    public function add_new_category()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            echo view('templates/admin_header');
            echo view('admin/add_new_category');
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
            $data['categories'] = $this->admin_model->get_categories();

            echo view('templates/admin_header', $data);
            echo view('admin/new_upload');
            echo view('templates/admin_footer');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function edit_upload($upload)
    {
        if (isset($_SESSION['admin_logged_in'])) {
            //dd(phpinfo());

            $data['upload'] = $this->postModel->where('id', $upload)->first();
            $data['categories'] = $this->admin_model->get_categories();

            echo view('templates/admin_header', $data);
            echo view('admin/edit_upload');
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

    public function changePassword()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            echo view('templates/admin_header');
            echo view('admin/change_password');
            echo view('templates/admin_footer');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function addAdmin()
    {
        if (isset($_SESSION['admin_logged_in'])) {
            echo view('templates/admin_header');
            echo view('admin/add_new_admin');
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

        $user = $this->admin_model->where('email', $email)->first();
        if ($user && password_verify($password, $user->password)) {

            $this->session->set('current_admin', $email);
            $this->session->set(
                'current_admin_fullname',
                $user->first_name . ' ' . $user->last_name
            );
            $this->session->set('current_admin_id', $user->id);
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
                    . '|max_size[uploaded_file,200000]',
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
                'volume' => $this->request->getVar('volume'),
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

    public function save_edit()
    {
        helper(['form', 'url']);

        //Call the validation library
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                'category' => ['label' => 'Category', 'rules' => 'required'],
                'volume' => ['label' => 'Category', 'rules' => 'required'],
                'description' => ['label' => 'Description', 'rules' => 'required']
            ]
        );

        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'category' => $this->request->getVar('category'),
                'volume' => $this->request->getVar('volume'),
                'description' => $this->request->getVar('description')
            ];

            $this->postModel->update($this->request->getVar('upload_id'), $data);

            $this->session->setFlashdata('success', 'Item uploaded successfully');
            return redirect()->to('admin/new_upload');

        } else {
            $this->session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('admin/uploads');
        }

    }

    public function save_category()
    {
        helper(['form', 'url']);

        //Call the validation library
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                'category' => ['label' => 'Category', 'rules' => 'required'],
            ]
        );

        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'category' => $this->request->getVar('category'),
            ];

            $this->admin_model->save_category($data);

            $this->session->setFlashdata('success', 'Added successfully');
            return redirect()->to('admin/add_new_category');

        } else {
            $this->session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('admin/uploads');
        }

    }

    public function delete_upload($upload_id)
    {
        $this->postModel->where('id', $upload_id)->delete();

        unlink('uploads/audio/upload_'.$upload_id.'_.mp3');

        return redirect()->to('admin/uploads');
    }

    public function updatePassword()
    {
        $old_password = $this->request->getPost('old_password');

        $user = $this->admin_model->where('email', $_SESSION['current_admin'])->first();

        if (password_verify($old_password, $user->password)) {
            $user->password = $this->request->getPost('password');
            if ($this->admin_model->save($user)) {
                $this->session->setFlashdata('success', 'Admin Saved successfully');
                return redirect()->to('admin/changePassword');
            } else {
                $this->session->setFlashdata('errors', $this->admin_model->errors());
                return redirect()->to('admin/changePassword');
            }
        } else {
            $this->session->setFlashdata('errors', array('Incorrect Old Password'));
            return redirect()->to('admin/changePassword');
        }

    }

    public function saveAdmin()
    {
        $data = $this->request->getPost();

        $user = new \App\Entities\Admin();
        $user->fill($data);
        if ($this->admin_model->save($user)) {
            $this->session->setFlashdata('success', 'Admin Saved successfully');
            return redirect()->to('admin/addAdmin');
        } else {
            $this->session->setFlashdata('errors', $this->admin_model->errors());
            return redirect()->to('admin/addAdmin');
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
