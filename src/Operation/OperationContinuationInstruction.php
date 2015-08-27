<?php

/**
 * @file
 * Contains \BartFeenstra\Payment\Bridge\Symfony\HttpFoundation\Operation\OperationContinuationInstruction.
 */

namespace BartFeenstra\Payment\Bridge\Symfony\HttpFoundation\Operation;

use BartFeenstra\Payment\Operation\OperationContinuationInstruction as GenericOperationContinuationInstruction;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Provides an operation continuation instruction.
 */
class OperationContinuationInstruction extends GenericOperationContinuationInstruction implements OperationContinuationInstructionInterface
{

    /**
     * The continuation response.
     *
     * @var \Symfony\Component\HttpFoundation\Response
     */
    protected $response;

    /**
     * Constructs a new instance.
     *
     * @param string $url
     *   The URL at which to continue the operation.
     * @param \Symfony\Component\HttpFoundation\Response|null $response
     *   A response or NULL to default to a redirect to the provided URL.
     */
    public function __construct($url, Response $response = null)
    {
        parent::__construct($url);
        $this->response = $response;
    }

    public function getResponse()
    {
        if (!$this->response) {
            $this->response = new RedirectResponse($this->url);
        }

        return $this->response;
    }

}
