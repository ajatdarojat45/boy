<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   protected $fillable = [
      'name', 'slug', 'description', 'image', 'icon'
   ];

   public function subServices()
   {
      return $this->hasMany(SubService::class);
   }
}
