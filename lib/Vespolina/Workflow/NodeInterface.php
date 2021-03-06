<?php

/**
 * (c) 2013 - ∞ Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\Workflow;

use Psr\Log\LoggerInterface;

interface NodeInterface
{
    /**
     * Accept the token into the node
     *
     * @param TokenInterface $token
     * @return boolean
     */
    function accept(TokenInterface $token);

    /**
     * The executable functionality. This needs to be implemented for custom places and transactions.
     * This method should not be called directly, but triggered by calling the accept() method
     *
     * @param TokenInterface $token
     * @return mixed
     */
    function execute(TokenInterface $token);

    /**
     * Add an incoming arc
     *
     * @param Arc $arc
     */
    function addInput(Arc $arc);

    /**
     * Return incoming arcs
     *
     * @return Arc[]
     */
    function getInputs();

    /**
     * Add an outgoing arc
     *
     * @param Arc $arc
     */
    function addOutput(Arc $arc);

    /**
     * Return outgoing arcs
     *
     * @return Arc[]
     */
    function getOutputs();

    /**
     * Return the tokens
     *
     * @return \Vespolina\Workflow\TokenInterface[]
     */
    function getTokens();

    /**
     * Set the name
     *
     * @param string $name
     *
     * @return $this
     */
    function setName($name);

    /**
     * Return the name
     *
     * @return string
     */
    function getName();

    /**
     * Set the workflow this node belongs to and that workflow's logger
     *
     * @param Workflow $workflow
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    function setWorkflow(Workflow $workflow, LoggerInterface $logger);
}
