<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['customer_name', 'phone', 'rating', 'message', 'ip_address', 'user_agent'])]
class Feedback extends Model
{
    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }
}
