<?php

namespace Wallabag\CoreBundle\Tests\Form\DataTransformer;

use Wallabag\CoreBundle\Form\DataTransformer\StringToListTransformer;

class StringToListTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider transformProvider
     */
    public function testTransformWithValidData($inputData, $expectedResult)
    {
        $transformer = new StringToListTransformer();

        $this->assertSame($expectedResult, $transformer->transform($inputData));
    }

    public function transformProvider()
    {
        return [
            [null, ''],
            [[], ''],
            [['single value'], 'single value'],
            [['first value', 'second value'], 'first value,second value'],
        ];
    }

    /**
     * @dataProvider reverseTransformProvider
     */
    public function testReverseTransformWithValidData($inputData, $expectedResult)
    {
        $transformer = new StringToListTransformer();

        $this->assertSame($expectedResult, $transformer->reverseTransform($inputData));
    }

    public function reverseTransformProvider()
    {
        return [
            [null, null],
            ['', []],
            ['single value', ['single value']],
            ['first value,second value', ['first value', 'second value']],
            ['first value,     second value', ['first value', 'second value']],
            ['first value,  ,  second value', ['first value', 'second value']],
        ];
    }
}
