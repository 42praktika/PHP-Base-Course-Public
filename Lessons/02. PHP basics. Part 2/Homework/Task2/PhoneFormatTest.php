<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PhoneFormatTest extends TestCase
{
    public function testPhoneFormat(): void
    {
        $this->assertEquals('+7 (917) 232-87-98', makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
        $this->assertEquals('+1 (111) 111-11-11', makePhoneNumberFromArray([1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]));
    }

    public function setUp(): void
    {
        require_once 'makePhoneNumberFromArray.php';
    }
}