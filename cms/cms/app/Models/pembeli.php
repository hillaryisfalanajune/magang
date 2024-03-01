<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];

    public function job()
    {
        return $this->belongsTo(role::class);
        return $this->belongsTo(pembayaran::class);

    }

    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
}

