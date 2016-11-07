<?php

use App\User;

class UserTest extends TestCase
{
    /**
     * test login method.
     *
     * @return void
     */
    public function testLogin()
    {
        $this
            ->get('api/v1/login?email=testing@mailforspam.com&password=testing@mailforspam.com')
            ->seeJsonContains([
                'code' => 200
            ]);
    }

    /**
     *  test registration method.
     *
     * @return  void
     */
    public function testRgistration()
    {
        // check  validation fail
        $this
            ->get('api/v1/registration?name=test_accaunt&email=test_accauntmailforspam.com&password=test_accaunt')
            ->seeJsonContains([
                'code' => 500
            ]);

        $this
            ->get('api/v1/registration?email=test_accaunt@mailforspam.com')
            ->seeJsonContains([
                'code' => 500
            ]);

        $this
            ->get('api/v1/registration?email=test_accaunt@mailforspam.com&password=test_accaunt')
            ->seeJsonContains([
                'code' => 500
            ]);

        // check registration new user
        $this
            ->get('api/v1/registration?name=test_accaunt&email=test_accaunt@mailforspam.com&password=test_accaunt')
            ->seeJsonContains([
                'code' => 200
            ]);

        // clear user after test
        User::where('email','=','test_accaunt@mailforspam.com')->delete();
    }
}
