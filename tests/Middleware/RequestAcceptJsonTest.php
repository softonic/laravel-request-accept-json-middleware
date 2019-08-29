<?php

namespace Softonic\RequestAcceptJson\Tests\Middleware;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Softonic\RequestAcceptJson\Middleware\RequestAcceptJson;

class RequestAcceptJsonTest extends TestCase
{
    /**
     * @test
     */
    public function whenItDoesNotReceiveAnAcceptHeaderItShouldSetToApplicationJson()
    {
        $mockRequest = $this->getRequest();
        $middleware  = new RequestAcceptJson();

        $result = $middleware->handle(
            $mockRequest,
            function ($request) {
                return $request;
            }
        );
        $this->assertSame('application/json', $result->header('Accept'));
    }

    /**
     * @test
     */
    public function whenReceiveAnAcceptHeaderItShouldNotModifyIt()
    {
        $mockRequest = $this->getRequest(['Accept' => 'text/csv']);
        $middleware  = new RequestAcceptJson();

        $result = $middleware->handle(
            $mockRequest,
            function ($request) {
                return $request;
            }
        );
        $this->assertSame('text/csv', $result->header('Accept'));
    }

    private function getRequest($headers = [])
    {
        $request = new Request([], [], [], [], [], [], '');

        foreach ($headers as $name => $value) {
            $request->headers->set($name, $value);
        }

        return $request;
    }
}
