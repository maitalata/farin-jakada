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

    protected $table      = 'administrators';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Admin::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['first_name', 'last_name', 'email', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'first_name' => 'required|min_length[2]',
        'last_name'  => 'required|min_length[2]',
        'email'      => 'required|valid_email|is_unique[administrators.email]',
        'password'   => 'required|min_length[8]',
        'confirm'    => 'required_with[password]|matches[password]'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false; 

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];   

    public function getAllUploads()
    {
        $builder = $this->db->table('uploads');
        $query = $builder->get();
        return $query->getResult();
    }

    public function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }
    
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        //unset($data['data']['password']);
    
        return $data;
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

    public function save_category($data)
    {
        $this->db->table('categories')->insert($data);
    }

    /**
     * Get the total number of uploaded items
     * 
     * @return void
     */
    public function getLastId()
    {
        $builder = $this->db->table('uploads');
        $builder->orderBy('id', 'DESC');
        $builder->limit(1, 0);
        $query = $builder->get();
        if($builder->countAllResults() == 0)
        {
            return 0;
        } else {
            $last_row = $query->getRow();
            return $last_row->id;
        }
        
    }

    public function get_categories()
    {
        $builder = $this->db->table('categories');
        $query = $builder->get();
        return $query->getResult();
    }

}
