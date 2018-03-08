<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
   protected $fillable = [
      'name', 'slug', 'description', 'image', 'service_id'
   ];

   protected $with = [
      'service'
   ];

   public function service()
   {
      return $this->belongsTo(Service::class);
   }

   public function detailServices()
   {
      return $this->hasMany(DetailService::class);
   }
}
