<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model
    {
        protected $table = 'users';

        protected $allowedFields = [
            'username',
            'name',
            'email',
            'password',
            'created_date',
            'status',
            'role_id'
        ];
    }
  ?>