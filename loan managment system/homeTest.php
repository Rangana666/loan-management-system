

<?php

require 'home.php'; 
use PHPUnit\Framework\TestCase;

class homeTest extends TestCase
{
    public function testhomeFunction() {
        $result = homeFunction('expected_value'); 
        $this->assertEquals('expected output', $result); 

        $result = homeFunction('unexpected_value'); 
        $this->assertEquals('unexpected output', $result); 
    }
}
?>

