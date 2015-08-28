<?php

/**
 * @file
 * Contains \Commercie\Tests\Payment\Bridge\Symfony\HttpFoundation\OperationContinuationInstructionTest.
 */

namespace Commercie\Tests\Payment\Bridge\Symfony\HttpFoundation\Operation;

use Commercie\Payment\Bridge\Symfony\HttpFoundation\Operation\OperationContinuationInstruction;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @coversDefaultClass \Commercie\Payment\Bridge\Symfony\HttpFoundation\Operation\OperationContinuationInstruction
 */
class OperationContinuationInstructionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers ::getResponse
     * @covers ::__construct
     */
    function testGetResponse()
    {
        $url = 'http"//example.com/' . mt_rand();

        $response = $this->getMock(Response::class);

        $sut = new OperationContinuationInstruction($url, $response);

        $this->assertSame($response, $sut->getResponse());
    }

    /**
     * @covers ::getResponse
     * @covers ::__construct
     */
    function testGetResponseWithoutResponse()
    {
        $url = 'http"//example.com/' . mt_rand();

        $sut = new OperationContinuationInstruction($url);

        /** @var \Symfony\Component\HttpFoundation\RedirectResponse $response */
        $response = $sut->getResponse();
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($url, $response->getTargetUrl());

    }

}
