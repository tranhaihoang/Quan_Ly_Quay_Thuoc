<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutDoseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_id ',
        'weight',
        'age_min',
        'age_max',
        'gender',
    ];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
    public function cutDoseOrderDetail()
    {
        return $this->hasOne(CutDoseOrderDetails::class);
    }
}
