<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Home Model. Contains all database handling methods for home database interactions
 *
 * @category Models
 * @package  App\Models
 * @author   Umar Sunusi Maitalata <maitalata@gmail.com>
 * @license  MIT The MIT License (MIT)
 * @link     https://www.farinjakada.com
 */
class HomeModel extends Model
{

    public function getAllUploads()
    {
        $builder = $this->db->table('uploads');
        $builder->orderBy('added_on', 'DESC');
        $query = $builder->get();

        return $query->getResult();
    }

}
