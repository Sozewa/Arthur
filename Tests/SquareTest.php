<?php
namespace Kupris;

require_once __DIR__.'/../core/EquationInterface.php';
require_once __DIR__.'./../core/LogAbstract.php';
require_once __DIR__.'./../core/LogInterface.php';
require_once __DIR__.'./../Kupris/KuprisException.php';
require_once __DIR__.'./../Kupris/MyLog.php';
require_once __DIR__.'./../Kupris/Linear.php';

use PHPUnit\Framework\TestCase;

Class SquareTest extends TestCase
{
  protected $square;

  protected function setUp() : void
  {
    $this->square= new Square();
  }

  /**
  * @dataProvider providerSquareEquation
  *  Проверка решения квадратного уравнения
  */

  public function testSquareEquation($a, $b, $c, $result) : void
  {
    $this->assertEquals($result, $this->square->solve($a, $b, $c));
  }

  public function providerSquareEquation() : array
  {
    return array(
      array(-3, 0, 75, [-5,5]),
      array(4, -12, 9, [1.5]),
      array(0, 2, -8, 4)
    );
  }

  /**
  * @dataProvider providerException
  *  Проверка выбрасывания ошибки
  */

  public function testException($a, $b, $c) : void
  {
    $this->expectException(KuprisException::Class);
    $this->square->solve($a, $b, $c);
  }

  public function providerException() : array
  {
    return array(
      array(0, 0, 0),
      array(-4, 0, -20),
      array(0, "b", -9),
    );
  }
}
?>
