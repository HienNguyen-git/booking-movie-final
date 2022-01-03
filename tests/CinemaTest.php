<?php

use PHPUnit\Framework\TestCase;

require_once('db.php');
class CinemaTest extends TestCase{
    public function testLoginTrue(){
        // $cinema = new App\Cinema;
        // $result = $cinema->login('tronghien123654@gmail.com','123456');
        $result = login('tronghien','123456');
        $expect = array('code'=>0,'success'=>'');
        $this->assertEquals($expect['code'],$result['code']);
    }
    
    public function testLoginFalse(){
        $result = login('tronghien','111111');
        $expect = array('code'=>0,'success'=>'');
        $this->assertNotEquals($expect['code'],$result['code']);
    }

    public function testCheckEmailIsExist(){
        $result = is_email_exist('tronghien123654@gmail.com');
        $this->assertEquals(true,$result);
    }
    
    public function testCheckEmailIsNotExist(){
        $result = is_email_exist('test@test.com');
        $this->assertEquals(false,$result);
    }

    public function testGetMovieById(){
        $result = get_movie_by_id(23);
        $expect = array('code'=>0,'success'=>'');
        $this->assertEquals($expect['code'],$result['code']);
    }

    public function testGetMovieByIdNotSuccess(){
        $result = get_movie_by_id(1);
        $expect = array('code'=>0,'success'=>'');
        $this->assertNotEquals($expect['code'],$result['code']);
    }

    public function testUserBooking(){
        $result = get_user_bookings('tronghien');
        $expect = array('code'=>0,'success'=>'');
        $this->assertEquals($expect['code'],$result['code']);
    }

    public function testUserBookingNotExist(){
        $result = get_user_bookings('someone');
        $expect = array('code'=>0,'success'=>'');
        $this->assertNotEquals($expect['code'],$result['code']);
    }

    public function testHallNameExist(){
        $result = get_hall_by_name('Main Hall');
        $expect = array('code'=>0,'success'=>'');
        $this->assertEquals($expect['code'],$result['code']);
    }

    public function testHallNameNotExist(){
        $result = get_hall_by_name(7);
        $expect = array('code'=>0,'success'=>'');
        $this->assertNotEquals($expect['code'],$result['code']);
    }
}
?>      