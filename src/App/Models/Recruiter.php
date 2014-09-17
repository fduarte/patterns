<?php
namespace App\Models;

use Goiaba\Data\Model as Model,
    App\Models\Location as Location;

class Recruiter extends People
{
   public $name = 'Mr. Smith';

   public $age = '38';

   public $address;    

   public function __construct() 
   {
        $this->address = new Location(); 
   }

}
