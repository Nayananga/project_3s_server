<?php declare(strict_types=1);

namespace Tests\integration;

class UserTest extends BaseTestCase
{
    private static $id;

    /**
     * Test Get All Users.
     */
    public function testGetUsers()
    {
        $response = $this->runApp('GET', '/api/v1/users');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('phoneNo', $result);
        $this->assertStringContainsString('image', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Get One User.
     */
    public function testGetUser()
    {
        $response = $this->runApp('GET', '/api/v1/users/2');

        $result = (string) $response->getBody();

        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Get User Not Found.
     */
    public function testGetUserNotFound()
    {
        $response = $this->runApp('GET', '/api/v1/users/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('phoneNo', $result);
        $this->assertStringContainsString('image', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Search Users.
     */
    public function testSearchUsers()
    {
        $response = $this->runApp('GET', '/api/v1/users/search/aththa');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        /*$this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);*/
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Search User Not Found.
     */
    public function testSearchUserNotFound()
    {
        $response = $this->runApp('GET', '/api/v1/users/search/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('phoneNo', $result);
        $this->assertStringContainsString('iamge', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Create User.
     */
    public function testCreateUser()
    {
        $response = $this->runApp(
            'POST', '/api/v1/users',
            ['nic' => '956487147v', 'nickname' => 'saman', 'email' => 'saman12@.com', 'phoneNo' => '0702018472', 'image' => '']
        );

        $result = (string) $response->getBody();

        /*self::$id = json_decode($result)->message->id;*/

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('phoneNo', $result);
        $this->assertStringContainsString('image', $result);
        
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Create User Without Name.
     */
    public function testCreateUserWithoutName()
    {
        $response = $this->runApp('POST', '/api/v1/users',
            ['nic' => '959764158v', 'nickname' => '', 'email' => 'roshan@email.com', 'phoneNo' => '0717130881', 'image' => '']

        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('phoneNo', $result);
        $this->assertStringContainsString('image', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Create User Without Email.
     */
    public function testCreateUserWithoutEmail()
    {
        $response = $this->runApp('POST', '/api/v1/users',
            ['nic' => '953474110v', 'nickname' => 'Shehan', 'email' => '', 'phoneNo' => '0710390283', 'image' => '']);

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Create User With Invalid Name.
     */
    public function testCreateUserWithInvalidName()
    {
        $response = $this->runApp(
            'POST', '/api/v1/users',
            ['nic' => '953583767v', 'nickname' => 'A', 'email' => 'nipuna@email.com', 'phoneNo' => '0707889647', 'image' => '']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }
# TODO: Validate nic and phoneNo and test them
    /**
     * Test Create User With Invalid Email.
     */
    public function testCreateUserWithInvalidEmail()
    {
        $response = $this->runApp(
            'POST', '/api/v1/users',
            ['nic' => '953753956v', 'nickname' => 'Esteban', 'email' => 'email.incorrecto', 'phoneNo' => '0718889647', 'image' => '']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }
# TODO: Check nic already given
    /**
     * Test Create User With An Email That Already Exists.
     */
    public function testCreateUserWithEmailAlreadyExists()
    {
        $response = $this->runApp(
            'POST', '/api/v1/users',
            ['nic' => '953464558v', 'nickname' => 'Esteban', 'email' => 's.lahiru1995@gmail.com', 'phoneNo' => '0718889647', 'image' => '']
                    );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update User.
     */
    public function testUpdateUser()
    {
        $response0 = $this->runApp('POST', '/login', ['nic' => '953464110v']);
        $result0 = (string) $response0->getBody();
       self::$jwt = json_decode($result0)->message->Authorization;

        $response = $this->runApp('PUT', '/api/v1/users/' .['nic' => '953464110v', 'nickname' => 'Ravidu', 'email' => 'deyya@email.com', 'phoneNo' => '0702018472', 'image' => '']);
        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('nic', $result);
        $this->assertStringContainsString('nickname', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('phoneNo', $result);
        $this->assertStringContainsString('image', $result);

        
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Update User Without Send Data.
     */
    public function testUpdateUserWithOutSendData()
    {
        $response0 = $this->runApp('POST', '/login', ['nic' => '953464110v']);
        $result0 = (string) $response0->getBody();
        self::$jwt = json_decode($result0)->message->Authorization;

        $response = $this->runApp('PUT', '/api/v1/users/' .['nic' => '953464110v', 'nickname' => 'Ravidu', 'email' => 'deyya@email.com', 'phoneNo' => '0702018472', 'image' => '']);

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('email', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update User Permissions Failed.
     */
    public function testUpdateUserPermissionsFailed()
    {
        $response0 = $this->runApp('POST', '/login', ['nic' => '953464110v']);
        $result0 = (string) $response0->getBody();
        self::$jwt = json_decode($result0)->message->Authorization;

        $response = $this->runApp(
            'PUT', '/api/v1/users/1', ['nickname' => 'deiyaa']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('name', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update User With Invalid Data.
     */
    public function testUpdateUserWithInvalidData()
    {
        $response0 = $this->runApp('POST', '/login', ['nic' => '953464110v']);
        $result0 = (string) $response0->getBody();
        self::$jwt = json_decode($result0)->message->Authorization;

        $response = $this->runApp(
            'PUT', '/api/v1/users/'.[ 'nickname' => 'Z', 'email' => 'espn.....']
);

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('email', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Delete User.
     */
    public function testDeleteUser()
    {
        $response0 = $this->runApp('POST', '/login', ['nic' => '953464110v']);
        $result0 = (string) $response0->getBody();
        self::$jwt = json_decode($result0)->message->Authorization;
        $response = $this->runApp('DELETE', '/api/v1/users/' .['nic' => '953464110v']);

        $result = (string) $response->getBody();

        $this->assertEquals(204, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Delete User Permissions Failed.
     */
    public function testDeleteUserPermissionsFailed()
    {
        $response = $this->runApp('DELETE', '/api/v1/users/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test that user login endpoint it is working fine.
     */
    public function testLoginUser()
    {
        $response = $this->runApp('POST', '/login', ['nic' => '953464110V']);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('status', $result);
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('message', $result);
        $this->assertStringContainsString('Authorization', $result);
        $this->assertStringContainsString('Bearer', $result);
        $this->assertStringContainsString('ey', $result);
        $this->assertStringNotContainsString('ERROR', $result);
        $this->assertStringNotContainsString('Failed', $result);
    }

    /**
     * Test login endpoint with invalid credentials.
     */
    public function testLoginUserFailed()
    {
        $response = $this->runApp('POST', '/login', ['nic' => '953464147V']);

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringContainsString('Login failed', $result);
        $this->assertStringContainsString('UserException', $result);
        $this->assertStringContainsString('error', $result);
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('Authorization', $result);
        $this->assertStringNotContainsString('Bearer', $result);
    }

    /**
     * Test login endpoint without send required field email.
     */
    public function testLoginWithoutEmailField()
    {
        $response = $this->runApp('POST', '/login', ['password' => 'p']);

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringContainsString('UserException', $result);
        $this->assertStringContainsString('error', $result);
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('Authorization', $result);
        $this->assertStringNotContainsString('Bearer', $result);
    }

    /**
     * Test login endpoint without send required field password.
     */
    public function testLoginWithoutPasswordField()
    {
        $response = $this->runApp('POST', '/login', ['email' => 'a@b.com']);

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringContainsString('UserException', $result);
        $this->assertStringContainsString('error', $result);
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('Authorization', $result);
        $this->assertStringNotContainsString('Bearer', $result);
    }
}
