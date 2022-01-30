<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Admin Models. Contains all database handling methods for administrator's sections
 *
 * @category Models
 * @package  App\Models
 * @author   Umar Sunusi Maitalata <maitalata@gmail.com>
 * @license  MIT The MIT License (MIT)
 * @link     https://www.farinjakada.com
 */
class AdminModel extends Model
{
    /**
     * Function that returns the hashed password of administrators or an emspty string
     *
     * @param mixed $email administrator's email address
     *
     * @return empty|string the hashed password of the admin
     */
    public function getHashedPassword($email)
    {
        $builder = $this->db->table('administrators');
        $query = $builder->getWhere(['email' => $email]);
        $row = $query->getRow();
        if ($row) {
            return $row->password;
        } else {
            return '';
        }
    }

    /**
     * This functions accept's administrator's email and return 1 if the
     * administrator exist, otherwise it returns 0.
     *
     * @param mixed $email administrator's email
     *
     * @return int
     */
    public function checkLogin($email)
    {
        $builder = $this->db->table('administrators');
        $builder->getWhere(['email' => $email]);
        return $builder->countAllResults();
    }

    /**
     * Function that get admin email and return all the details associated with that
     * email
     *
     * @param mixed $email Administrator's email address
     * 
     * @return object
     */
    public function getAdminDetails($email)
    {
        $builder = $this->db->table('administrators');
        $query = $builder->getWhere(['email' => $email]);
        return $query->getRow();
    }

    /**
     * Saves an item upload data to the database.
     *
     * @param mixed[] $data collection of the items data
     * 
     * @return void
     */
    public function saveUpload($data)
    {
        $this->db->table('uploads')->insert($data);
    }

    /**
     * Get the total number of uploaded items
     * 
     * @return void
     */
    public function getTotalUploads()
    {
        $builder = $this->db->table('uploads');
        return $builder->countAllResults();
    }

}
