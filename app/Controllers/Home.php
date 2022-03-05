<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

/**
 * Home Controller. Contains functions for returning the landing page, search
 * handlers and newsletters update subscriptions 
 * 
 * @category Controllers
 * @package  App\Controllers
 * @author   Umar Sunusi Maitalata <maitalata@gmail.com>
 * @license  MIT The MIT License (MIT)
 * @link     https://www.farinjakada.com
 */
class Home extends BaseController
{
    /**
     * Index page. The function returns the landing page.
     *
     * @return mixed
     */
    public function index($offset = 0)
    {
        // $data['uploads'] = $this->home_model->getAllUploads();
        // $data['Time'] = Time::class;

        // echo view('templates/header', $data);
        // echo view('home');
        // echo view('templates/footer');

        $post = $this->postModel->findAll();
        //echo dd($this->db);
        echo dd($post);
    }

    public function saver()
    {
        // $data['uploads'] = $this->home_model->getAllUploads();
        // $data['Time'] = Time::class;

        // echo view('templates/header', $data);
        // echo view('home');
        // echo view('templates/footer');

        $data = [
            'category' => 'Lorem Ipsum',
            'description' => 'egfrgrfhrhrhrhrfhrfhr dhdfhgfgghrfr'
        ];

        $post = $this->postModel->insert($data);
      
    }

}
