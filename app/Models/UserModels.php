<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'User';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['Username', 'Email', 'Password', 'Role'];
    protected $useTimestamps = false;
}