<?php
namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuestionControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $client->request('GET', '/questions');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $client->request('GET', '/questions', ['lang' => 'es']);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreate()
    {
        $client = static::createClient();

        $question = [
            'text' => 'How old are you?',
            'createdAt' => '01/01/2020',
            'choices' => [
                0 => ['text' => '0-30'],
                1 => ['text' => '31-65'],
                2 => ['text' => '+65']
            ]
        ];
        $client->request('POST', '/questions', $question);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
