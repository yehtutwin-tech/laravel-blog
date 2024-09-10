<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_user_email_domain_is_correct()
    {
        $user = new User(['email' => 'susu@lifestyle.com']);

        $this->assertEquals('lifestyle.com', $user->getEmailDomain());
        // $this->assertTrue(true);
    }
}
