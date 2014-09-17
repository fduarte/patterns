<?php
namespace App\Models;

use Goiaba\Data\Model as Model;

class Location extends Model
{
   public $table = 'location';

   public $streetAddress;

   public $city;

   public $state;

   public $zip;

   public $country;

   public function __construct()
   {
        $this->streetAddress = '123 ABC Road';
        $this->city = 'Orlando';
        $this->state = 'FL';
        $this->zip = '32825';
        $this->country = 'U.S.A.';
   }

}
