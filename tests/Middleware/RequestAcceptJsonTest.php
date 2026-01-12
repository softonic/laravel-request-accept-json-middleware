<?php

namespace Softonic\RequestAcceptJson\Tests\Middleware;

use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Softonic\RequestAcceptJson\Middleware\RequestAcceptJson;

class RequestAcceptJsonTest extends TestCase
{
    #[Test]
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

    #[Test]
    public function whenItReceivesWildcardAcceptHeaderItShouldSetToApplicationJson()
    {
        $mockRequest = $this->getRequest(['Accept' => '*/*']);
        $middleware  = new RequestAcceptJson();

        $result = $middleware->handle(
            $mockRequest,
            function ($request) {
                return $request;
            }
        );
        $this->assertSame('application/json', $result->header('Accept'));
    }

    #[Test]
    public function whenItReceivesApplicationWildcardAcceptHeaderItShouldSetToApplicationJson()
    {
        $mockRequest = $this->getRequest(['Accept' => 'application/*']);
        $middleware  = new RequestAcceptJson();

        $result = $middleware->handle(
            $mockRequest,
            function ($request) {
                return $request;
            }
        );
        $this->assertSame('application/json', $result->header('Accept'));
    }

    #[Test]
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

    private function getRequest(array $headers = []): Request
    {
        $request = new Request([], [], [], [], [], [], '');

        foreach ($headers as $name => $value) {
            $request->headers->set($name, $value);
        }

        return $request;
    }
}
