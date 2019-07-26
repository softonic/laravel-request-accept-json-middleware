<?php

namespace Softonic\RequestAcceptJson\Tests\Middleware;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Softonic\RequestAcceptJson\Middleware\RequestAcceptJson;

class RequestAcceptJsonTest extends TestCase
{
    public function testHandle()
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

    private function getRequest()
    {
        return new Request([], [], [], [], [], [], '');
    }
}
