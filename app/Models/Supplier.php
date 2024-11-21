<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow the Laravel naming convention
    protected $table = 'suppliers';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'SupplierName',
        'ContactEmail',
        'PhoneNumber',
        'Address',
    ];

    // Define primary key if it is not the default 'id'
    protected $primaryKey = 'SupplierID';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = true;
}
