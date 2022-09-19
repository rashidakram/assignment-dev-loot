<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Role
{
   public const ROLE_ADMIN = 1;
   public const ROLE_BUSINESS = 2;
   public const ROLE_CUSTOMER = 3;


   public static function roles($roleId = false){
      $roles = [
         self::ROLE_ADMIN => 'Admin',
         self::ROLE_BUSINESS => 'Business',
         self::ROLE_CUSTOMER => 'Customer'
      ];
      if($roleId){
         return (isset($roles[$roleId])) ? $roles[$roleId] : 'Unknown Role';
      }
      
   }
}
