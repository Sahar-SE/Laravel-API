<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;

  // The fields that user can fill it with data
  protected $fillable = [
    'name',
    'type',
    'email',
    'address',
    'city',
    'state',
    'postal_code'
  ];

  public function invoices() {
    return $this->hasMany(Invoice::class);
  }
}
