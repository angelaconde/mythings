<?php

namespace Tests\Unit;

use App\Http\Controllers\GameController;
use PHPUnit\Framework\TestCase;

class GameFunctionTest extends TestCase
{
    /**
     * Test for the ConvertStringToMinutes function.
     *
     * @dataProvider provideStringsToMinutesData
     * @return void
     */
    public function testConvertStringToMinutesFunction($expectedResult, $input)
    {
        $gameController = new GameController();
        $results = $gameController->convertStringToMinutes($input);
        $this->assertEquals($expectedResult, $results);
    }

    /**
     * Data for the ConvertStringToMinutesFunction test.
     * 
     * @return array
     */
    public function provideStringsToMinutesData()
    {
        return [
            'one hour' => [
                60,
                '1 Hour',
            ],
            'one hour and a half' => [
                90,
                '1½ Hour',
            ],
            'some hours' => [
                180,
                '3 Hours',
            ],
            'some hours and a half' => [
                210,
                '3½ Hours',
            ],
            'one minute' => [
                1,
                '1 Minute',
            ],
            'some minutes' => [
                45,
                '45 Minutes',
            ],
            'only seconds' => [
                0,
                '30 Seconds',
            ],
            'invalid string' => [
                0,
                'this is an invalid string to convert'
            ],
        ];
    }

    /**
     * Test for the imageExists function.
     *
     * @dataProvider provideImageExistsData
     * @return void
     */
    public function testImageExistsFunction($expectedResult, $input)
    {
        $gameController = new GameController();
        $results = $gameController->imageExists($input);
        $this->assertEquals($expectedResult, $results);
    }

    /**
     * Data for the ImageExistsFunction test.
     * 
     * @return array
     */
    public function provideImageExistsData()
    {
        return [
            'image not found' => [
                false,
                'not_found',
            ],
            'image found: string id' => [
                true,
                'fm45msld',
            ],
            'image found: numeric id as string' => [
                true,
                '5845849',
            ],
            'image found: numeric id as integer' => [
                true,
                5845849,
            ],
            'image found: numeric id as negative integer' => [
                true,
                -1,
            ],
            'image found: string with whitespaces in the middle' => [
                true,
                'fmkf mfk kdms',
            ],
            'image found: string with dashes' => [
                true,
                'fmd43-3kc',
            ],
            'image found: string with whitespaces at start and end' => [
                true,
                ' fkd53mekmc ',
            ],
        ];
    }
}
