<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactMessageModel extends Model
{
    protected $table = 'contact_messages';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'phone', 'subject', 'message', 'is_read'];
    protected $useTimestamps = true;
}
