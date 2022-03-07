<?php

namespace App\Tests;

use App\Entity\Users;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{

    public function testIsTrue(){
        $user = new Users();

        $user->setEmail('true@test.com');
        $user->setLastname('Jean');
        $user->setFirstname('Paul');
        $user->setAddress('Rue de la loge');
        $user->setZipcode('34000');
        $user->setCity('Montpellier');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getLastname() === 'Jean');
        $this->assertTrue($user->getFirstname() === 'Paul');
        $this->assertTrue($user->getAddress() === 'Rue de la loge');
        $this->assertTrue($user->getZipcode() === '34000');
        $this->assertTrue($user->getCity() === 'Montpellier');
    }

    public function testIsFalse(){
        
        $user = new Users();

        $user->setEmail('real@test.com');
        $user->setLastname('Pierre');
        $user->setFirstname('Julien');
        $user->setAddress('Avenue de la liberté');
        $user->setZipcode('57000');
        $user->setCity('Metz');

        $this->assertFalse($user->getEmail() === 'fake@test.com');
        $this->assertFalse($user->getLastname() === 'Jean');
        $this->assertFalse($user->getFirstname() === 'Paul');
        $this->assertFalse($user->getAddress() === 'Rue de la loge');
        $this->assertFalse($user->getZipcode() === '34000');
        $this->assertFalse($user->getCity() === 'Montpellier');
        
    }

    public function testIsEmpty(){
        $user = new Users();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getAddress());
        $this->assertEmpty($user->getZipcode());
        $this->assertEmpty($user->getCity());


    }
}
