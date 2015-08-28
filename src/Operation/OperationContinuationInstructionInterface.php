<?php

/**
 * @file
 * Contains \Commercie\Payment\Bridge\Symfony\HttpFoundation\Operation\OperationContinuationInstructionInterface.
 */

namespace Commercie\Payment\Bridge\Symfony\HttpFoundation\Operation;

use Commercie\Payment\Operation\OperationContinuationInstructionInterface as GenericOperationContinuationInstructionInterface;

/**
 * Defines an operation continuation instruction.
 */
interface OperationContinuationInstructionInterface extends GenericOperationContinuationInstructionInterface
{

    /**
     * Gets the response for the user to continue the operation.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse();

}
