<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once __DIR__ . '/../core/EquationInterface.php';
include_once __DIR__ . '/../core/LogInterface.php';
include_once __DIR__ . '/../core/LogAbstract.php';
include_once __DIR__ . '/../Kupris/Linear.php';
include_once __DIR__ . '/../Kupris/Square.php';
include_once __DIR__ . '/../Kupris/KuprisExeption.php';
include_once __DIR__ . '/../Kupris/Log.php';
class LinearTest extends TestCase {
	public function testLinear1() : void
	{
		$a = new Kupris\Linear();
		$this->assertEquals([-2],$a->linear(5,10));
	}
	public function testLinear2() : void
	{
        $a = new Kupris\Linear();
        $this->assertEquals([0],$a->linear(5,0));
	}
	public function testExpectExeption1() : void
	{
        $a = new Kupris\Linear();
        $this->expectExeption(Kupris\KuprisExeption::class);
        $a->linear(0,5);
	}
	public function testExpectExeption2() : void
	{
        $a = new Kupris\Linear();
        $this->expectExeption(Kupris\KuprisExeption::class);
        $a->linear(0,0);
	}
}