<?php
namespace App\Models;

use Goiaba\Data\Model as Model,
    Goiaba\Util\Validator as Validator,
    App\Models\Applicant as Applicant,
    App\Models\Recruiter as Recruiter;

class Jobs extends Model
{
   public $table = 'jobs';

   public $name = 'PHP Web Developer';

   public function __construct()
   {
       $this->validate($this);

       $this->applicant = new Applicant();

       $this->recruiter = new Recruiter();
   }

   // Test method 
   public function setRank($rank)
   {
       $options = array('min_range' => 0, 'max_range' => 10);
       $isValidRank = Validator::validateInt($rank, $options);

       if (!isset($job->rank)) {
           $this->rank = $rank;
           return $this;
       }  

   }
}
