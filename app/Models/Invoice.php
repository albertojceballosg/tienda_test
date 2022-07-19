<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function invoiceDetail()
    {
        return $this->hasMany('App\Models\InvoiceDetail');
    }
}
