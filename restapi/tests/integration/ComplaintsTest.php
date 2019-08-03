<?php declare(strict_types=1);

namespace Tests\integration;

class ComplaintTest extends BaseTestCase
{
    private static $id;

    /**
     * Test Get All Complaints.
     */
    public function testGetcomplaints()
    {
        $response = $this->runApp('GET', '/api/v1/complaints');

        $result = (string) $response->getBody();
        $value = json_encode(json_decode($result));

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user-id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('description', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertRegExp('{"code":200,"status":"success"}', $value);
        $this->assertRegExp('{"name":"[A-Za-z0-9_. ]+","description":"[A-Za-z0-9_. ]+"}', $value);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Get One complaint.
     */
    public function testGetComplaint()
    {
        $response = $this->runApp('GET', '/api/v1/complaints/1');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('user-id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('description', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Get complaint Not Found.
     */
    public function testGetComplaintNotFound()
    {
        $response = $this->runApp('GET', '/api/v1/notes/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringContainsString('user-id', $result);
        $this->assertStringContainsString('geo_tag', $result);
        $this->assertStringContainsString('description', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Search Complaint.
     */
    public function testSearchComplaints()
    {
        $response = $this->runApp('GET', '/api/v1/notes/search/n');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('description', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Search Complaint Not Found.
     */
    public function testSearchComplaintNotFound()
    {
        $response = $this->runApp('GET', '/api/v1/notes/search/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Create Complaint.
     */
    public function testCreateComplaint()
    {
        $response = $this->runApp(
            'POST', '/api/v1/reviews',
            ['name' => 'My Test Complaint', 'description' => 'New Complaint...']
        );

        $result = (string) $response->getBody();

        self::$id = json_decode($result)->message->id;

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('name', $result);
        $this->assertStringContainsString('description', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Create Complaint Without Name.
     */
    public function testCreateComplaintWithoutName()
    {
        $response = $this->runApp('POST', '/api/v1/complaints');

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('description', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Create Complaint With Invalid D.
     */
    public function testCreateComplaintWithInvalidName()
    {
        $response = $this->runApp(
            'POST', '/api/v1/complaints',
            ['description' => '']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('description', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update complaint.
     */
    public function testUpdateComplaints()
    {
        $response = $this->runApp(
            'PUT', '/api/v1/complaints/id=1',
            ['description' => 'good service']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('user_id', $result);
        $this->assertStringContainsString('description', $result);
        $this->assertStringContainsString('updated', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Update complaints Without Send Data.
     */
    public function testUpdateComplaintsWithOutSendData()
    {
        $response = $this->runApp('PUT', '/api/v1/complaints/id=1');

        $result = (string) $response->getBody();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('user-id', $result);
        $this->assertStringNotContainsString('description', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Update Complaint Not Found.
     */
    public function testUpdateComplaintsNotFound()
    {
        $response = $this->runApp(
            'PUT', '/api/v1/complaints/123456789', ['' => 'Complaint']
        );

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('user_id', $result);
        $this->assertStringNotContainsString('description', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }

    /**
     * Test Delete Complaint.
     */
    public function testDeleteCompliant()
    {
        $response = $this->runApp('DELETE', '/api/v1/complaints/id=1');

        $result = (string) $response->getBody();
        
//        var_dump($result); exit;

        $this->assertEquals(204, $response->getStatusCode());
        $this->assertStringContainsString('success', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /**
     * Test Delete COmplaint Not Found.
     */
    public function testDeleteComplaintNotFound()
    {
        $response = $this->runApp('DELETE', '/api/v1/complaints/123456789');

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringNotContainsString('success', $result);
        $this->assertStringNotContainsString('id', $result);
        $this->assertStringNotContainsString('user_id', $result);
        $this->assertStringNotContainsString('geo_tag', $result);
        $this->assertStringNotContainsString('description', $result);
        $this->assertStringNotContainsString('updated', $result);
        $this->assertStringContainsString('error', $result);
    }
}
