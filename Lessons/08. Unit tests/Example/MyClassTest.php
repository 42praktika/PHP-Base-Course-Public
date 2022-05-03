<?php

declare(strict_types=1);

require_once 'MyClass.php';

use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase {


    private MyClass $my;

    public function setUp(): void
    {
     $this->my = new MyClass();
    }

    public function tearDown(): void
    {

    }

    public function testpower()
    {

        $this->assertEquals(8, $this->my->power(2,3));
        $this->assertEquals(4, $this->my->power(2,2));
    }

    /**
     * @requires PHP < 7.0
     */
    public function testIncomplete()
    {
        self::assertEquals(2,2);
    }
}
