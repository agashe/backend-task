<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Order Statuses
    public static $statuses = [
        'New Order', 
        'Processing', 
        'Merged', 
        'Ready', 
        'Special Service'
    ];
}
