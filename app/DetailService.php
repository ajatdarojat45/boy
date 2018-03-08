<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
   protected $fillable = [
      'name', 'slug', 'description', 'image', 'sub_service_id',
   ];

   protected $with = [
      'subService',
   ];

   public function subService()
   {
      return $this->belongsTo(SubService::class);
   }
}
