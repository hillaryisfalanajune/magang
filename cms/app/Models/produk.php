<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['author','kategori'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false,function($query,$search){
            return
            $query->where('kode','like','%'. $search.'%')
            ->orWhere('name','like','%'. $search.'%');
        });


        $query->when(
            //author berasal dari url yang di kirim
            $filters['author'] ?? false,
            fn ($query,$author) =>
            //author berasal dari relasi method public function author()
            $query->whereHas('author',
                fn($query) =>
                $query->where('username', $author)
            )

        );

    }

    public function kategori()
    {
        //Post ke Categories Relasi satu ke satu
        return $this->belongsTo(Kategori::class);
    }

    //user ->oleh laravel user_id, ganti author_id
    public function author()
    {
        //Post ke Categories Relasi satu ke satu
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
