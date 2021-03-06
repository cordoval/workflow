<?php

/**
 * (c) 2013 - ∞ Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\Tests\Workflow;

use Vespolina\Tests\WorkflowCommon;

class ArcTest extends \PHPUnit_Framework_TestCase
{
    public function testAcceptSuccess()
    {
        $arc = WorkflowCommon::createArc();
        $tokenable = $this->getMock('Vespolina\Workflow\Node', array('accept'));
        $tokenable->expects($this->once())
            ->method('accept')
            ->will($this->returnValue(true));
        $arc->setTo($tokenable);
        $token = WorkflowCommon::createToken();
        $this->assertTrue($arc->accept($token), 'true should be returned when successful');
    }

    public function testAcceptFailure()
    {
        $arc = WorkflowCommon::createArc();
        $tokenable = $this->getMock('Vespolina\Workflow\Node', array('accept'));
        $tokenable->expects($this->once())
            ->method('accept')
            ->will($this->throwException(new \Exception));
        $arc->setTo($tokenable);
        $token = WorkflowCommon::createToken();
        $this->assertFalse($arc->accept($token), 'false should be returned when there is a problem');
    }
}