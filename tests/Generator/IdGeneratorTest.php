<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.12.16
 * Time: 09:44
 */
namespace Conversio\Util\Tests;

use Conversio\Util\Generator\IdGenerator;
use \PHPUnit_Framework_TestCase;

class IdGeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testLength()
    {
        $generator = new IdGenerator('mySeed');
        $this->assertEquals(5, strlen($generator->generateId(5)));
        $this->assertEquals(10, strlen($generator->generateId(10)));
        $this->assertEquals(20, strlen($generator->generateId(20)));
        $this->assertEquals(50, strlen($generator->generateId(50)));
        $this->assertEquals(500, strlen($generator->generateId(500)));
    }

    public function testUniqueness()
    {
        $generator = new IdGenerator('mySeed');
        for ($i = 0; $i < 500; $i++) {
            $this->assertNotEquals($generator->generateId(), $generator->generateId());
        }
    }
}