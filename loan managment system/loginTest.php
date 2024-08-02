

<?php

require 'login.php'; 

use PHPUnit\Framework\TestCase;

class loginTest extends TestCase
{
    public function testloginFunction() {
       
        $result = loginFunction('expected_value'); 
        $this->assertEquals('expected output', $result); 

        $result = loginFunction('unexpected_value'); 
        $this->assertEquals('unexpected output', $result); 
    }
}
?>
