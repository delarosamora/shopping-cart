<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;

        #region RELATIONS

        public function shopping_cart()
        {
            return $this->belongsToMany(ShoppingCart::class);
        }
        
        #endregion
}
