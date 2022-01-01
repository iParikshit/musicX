<?php 

namespace App\Models;  
use CodeIgniter\Model;

class AlbumModel  extends Model{

    protected $table = 'album';
    
    protected $allowedFields = [
        'artist',
        'album',
        'year',
        'created_at',
        'approve', 'user_id'
    ];

}