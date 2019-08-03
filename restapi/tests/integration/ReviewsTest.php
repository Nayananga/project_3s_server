<?php declare(strict_types=1);

namespace Tests\integration;

class ReviewTest extends BaseTestCase
{
    private static $id;

    /**
     * Test Get All reviews.
     */
    public function testGetRevies()
    {
        $response = $this->runApp('GET', '/api/v1/reviews');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Get One review.
     */
    public function testGetReview()
    {
        $response = $this->runApp('GET', '/api/v1/reviews/search/2 ');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Get reviews Not Found.
     */
    public function testGetReviewsNotFound()
    {
        $response = $this->runApp('GET', '/api/v1/reviews/search/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Search all Reviews.
     */
    public function testSearchAllReviews()
    {
        $response = $this->runApp('GET', '/api/v1/reviews');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Search REviews By deveice signature.
     */
    public function testSearchReviewByMobileSignature()
    {
        $response = $this->runApp('GET', '/api/v1/reviews/search/device_signature=Sent from Samsung Mobile');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Search Tasks with Status Done.
     */
    public function testSearchREviewsWithUserId()
    {
        $response = $this->runApp('GET', '/api/v1/reviews/search/user-id=3');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Search Tasks with status = 0.
     */
    public function testSearchReviewsWithId()
    {
        $response = $this->runApp('GET', '/api/v1/reviews/search/id= 1');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Create Task.
     */
    public function testCreateReviews()
    {
        $response = $this->runApp(
            'POST', '/api/v1/reviews', 
            ['user_id'=> '1','q&a'=>'{\r\n    \"q1\": \"Incididunt amet pariatur occaecat deserunt laborum tempor id.\",\r\n    \"q2\": \"Consectetur mollit consequat ullamco velit ut aliquip veniam enim eu nisi.\",\r\n    \"q3\": \"Consequat amet exercitation consectetur nisi.\",\r\n    \"q4\": \"Enim culpa reprehenderit deserunt dolor ea occaecat aliqua sit.\",\r\n    \"q5\": \"Mollit et ullamco amet ad proident et deserunt est.\",\r\n    \"q6\": \"Do Lorem do nulla occaecat sint.\",\r\n    \"q7\": \"Nostrud ea ad labore ex consequat adipisicing culpa excepteur id in.\",\r\n    \"q8\": \"Quis commodo irure pariatur quis anim nisi laborum incididunt esse aute cillum ad Lorem.\",\r\n    \"q9\": \"Aliquip duis dolor voluptate et.\",\r\n    \"q10\": \"Dolor aute Lorem eu cillum culpa.\"\r\n  }', '<meta name=\"geo.region\" content=\"LK-71\" />\r\n<meta name=\"geo.position\" content=\"7.555494;80.713785\" />\r\n<meta name=\"ICBM\" content=\"7.555494, 80.713785\" />\r\n', 'geo_tag'=>'Sent from my Android phone']
            
        );

        $result = (string) $response->getBody();

        /*self::$id = json_decode($result)->message->id;*/

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user-id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Create REview  Without Name.
     */
    /*public function testCreateReviewsWithOutTaskName()
    {
        $response = $this->runApp('POST', '/api/v1/reviews');

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Create Task With Invalid TaskName.
     */
   /* public function testCreateTaskWithInvalidTaskName()
    {
        $response = $this->runApp(
            'POST', '/api/v1/reviews', ['id' => '1', 'user_id' => '3']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }*/

    /**
     * Test Create Task With Invalid Status.
     */
    /*public function testCreateTaskWithInvalidStatus()
    {
        $response = $this->runApp(
            'POST', '/api/v1/tasks', ['name' => 'ToDo', 'status' => 123]
        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }*/

    /**
     * Test Create Task With Forbidden JWT.
     */
    public function testCreateReviewsWithInvalidJWT()
    {
        $auth = self::$jwt;
        self::$jwt = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI4Ii';
        $response = $this->runApp(
            'POST', '/api/v1/reviews', ['id' => '1']
        );
        self::$jwt = $auth;

        $result = (string) $response->getBody();

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Create Task Without Bearer JWT Auth.
     */
    public function testCreateTaskWithoutBearerJWT()
    {
        $auth = self::$jwt;
        self::$jwt = 'Bearer ';
        $response = $this->runApp(
            'POST', '/api/v1/reviews', ['id' => '1',]
        );
        self::$jwt = $auth;

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update Task.
     */
    public function testUpdatereviews()
{
        
        $response = $this->runApp(
            'PUT', '/api/v1/reviews/search/id=1',
            ['description' => 'good']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('name', $result);
        $this->assertStringContainsString('status', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Update Task Without Send Data.
     */
    public function testUpdateReviewWithOutSendData()
    {
        $response = $this->runApp('PUT', '/api/v1/reviews/search/id=2' );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update Task Not Found.
     */
    public function testUpdateReviewNotFound()
    {
        $response = $this->runApp(
            'PUT', '/api/v1/reviews/search/123456789'
        );

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Delete Task.
     */
    public function testDeleteReview()
    {
        $response = $this->runApp('DELETE', '/api/v1/reviews/search/1');

        $result = (string) $response->getBody();

        $this->assertEquals(204, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Delete Review Not Found.
     */
    public function testDeleteReviewNotFound()
    {
        $response = $this->runApp('DELETE', '/api/v1/reviews/search/id=123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }
}
