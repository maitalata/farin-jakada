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
class PostModel extends Model
{
    protected $table      = 'uploads';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Post::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['category', 'volume','description'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false; 

}
