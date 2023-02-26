<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CartStatus extends Model
{
    use HasFactory;
    public $timestamps = false;

    const IN_PROGRESS = 1;
    const PAYMENT_SUCCESSFUL = 2;
    const PAYMENT_ERROR = 3;
    const ABANDONED = 4;
}
