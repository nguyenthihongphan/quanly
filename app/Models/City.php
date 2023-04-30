<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'city';
    protected $fillable = [
        'id',
        'name',       
    ];
    
    public function district()
    {
        return $this->hasMany(District::class);
    }

    public function getAll()
    {
        return $this->all();
    }

    public function getAllNameById($city_id, $district_id)
    {
        $city = $this->where('id', $city_id)->first();
        $district = $city->district()->where('id', $district_id)->first();
        return [
            'city_name' => $city->name,
            'district_name' => $district->name,
        ];
    }
}
