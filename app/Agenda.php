<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['name', 'phone', 'estado', 'cidade', 'info', 'categoria','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* public function search($filter = null)
    {

        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate(15);


        return $results;
    }*/
}
