<?php

namespace App\Controllers;

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
        echo view('templates/header');
        echo view('home');
        echo view('templates/footer');
    }
}
