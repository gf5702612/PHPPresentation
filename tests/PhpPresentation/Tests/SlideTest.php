<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 * @link        https://github.com/PHPOffice/PHPPresentation
 */

namespace PhpOffice\PhpPresentation\Tests;

use PhpOffice\PhpPresentation\Slide;
use PhpOffice\PhpPresentation\Slide\Transition;
use PhpOffice\PhpPresentation\PhpPresentation;

/**
 * Test class for PhpPresentation
 *
 * @coversDefaultClass PhpOffice\PhpPresentation\PhpPresentation
 */
class SlideTest extends \PHPUnit_Framework_TestCase
{
    public function testExtents()
    {
        $object = new Slide();
        $this->assertNotNull($object->getExtentX());
        
        $object = new Slide();
        $this->assertNotNull($object->getExtentY());
    }
    
    public function testOffset()
    {
        $object = new Slide();
        $this->assertNotNull($object->getOffsetX());
        
        $object = new Slide();
        $this->assertNotNull($object->getOffsetY());
    }
    
    public function testParent()
    {
        $object = new Slide();
        $this->assertNull($object->getParent());
        
        $oPhpPresentation = new PhpPresentation();
        $object = new Slide($oPhpPresentation);
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\PhpPresentation', $object->getParent());
    }
    
    public function testSlideLayout()
    {
        $object = new Slide();
        $this->assertEquals(Slide\Layout::BLANK, $object->getSlideLayout());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setSlideLayout());
        $this->assertEquals(Slide\Layout::BLANK, $object->getSlideLayout());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setSlideLayout(Slide\Layout::TITLE_SLIDE));
        $this->assertEquals(Slide\Layout::TITLE_SLIDE, $object->getSlideLayout());
    }
    
    public function testSlideMasterId()
    {
        $value = rand(1, 100);
        
        $object = new Slide();
        $this->assertEquals(1, $object->getSlideMasterId());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setSlideMasterId());
        $this->assertEquals(1, $object->getSlideMasterId());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setSlideMasterId($value));
        $this->assertEquals($value, $object->getSlideMasterId());
    }
    
    public function testGroup()
    {
        $object = new Slide();
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Shape\\Group', $object->createGroup());
    }

    public function testName()
    {
        $object = new Slide();
        $this->assertNull($object->getName());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setName('AAAA'));
        $this->assertEquals('AAAA', $object->getName());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setName());
        $this->assertNull($object->getName());
    }

    public function testTransition()
    {
        $object = new Slide();
        $oTransition = new Transition();
        $this->assertNull($object->getTransition());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setTransition());
        $this->assertNull($object->getTransition());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setTransition($oTransition));
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide\\Transition', $object->getTransition());
        $this->assertInstanceOf('PhpOffice\\PhpPresentation\\Slide', $object->setTransition(null));
        $this->assertNull($object->getTransition());
    }
}