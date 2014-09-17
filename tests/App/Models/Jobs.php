<?php

require APPLICATION_PATH . '/Models/Jobs.php'; 

class JobsTest extends PHPUnit_Framework_TestCase {
    
    public function testRank() {
        $job = new Jobs();
        $testRank = 5;
        $this->assertEquals($jobs->rank($job, 5), $testRank);

        $this->assertFalse($jobs->rank($job, 11));
    }
}
