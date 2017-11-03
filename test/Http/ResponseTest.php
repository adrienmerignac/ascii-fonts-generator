<?php

namespace ASCII\Test\Http;

use ASCII\Http\Response;
class ResponseTest extends \PHPUnit\Framework\TestCase
{

	public function getResponse ()
	{
		return $this->getMockBuilder(Response::class)->getMock();
	}

	public function constructProvider ()
	{
		return [
			["body", ""],
			["header", []],
			["status", 200],
			["reason", "OK"],
		];	
	}
	
	/**
	 * @dataProvider constructProvider
	 */
	public function testConstruct ($propertyName, $value)
	{
		$class = new \ReflectionClass(Response::class);
		$prop = $class->getProperty($propertyName);
		$prop->setAccessible(true);
		$response = $class->newInstanceArgs([]);
		// On vérifie que l'attribut a la valeur attendue
		$this->assertTrue($value === $prop->getValue($response));
	}
	
// 	public function statusProvider ()
// 	{
// 		return [
// 			[null, null],	
// 			[[], []],
// 			["Hello", "World"],
// 		];
// 	}
	
// 	/**
// 	 * @dataProvider statusProvider
// 	 * @expectedException \TypeError
// 	 */
//     public function testSetStatus ($status, $reason)
//     {
// 		$this->getResponse()->setStatus($status, $reason);
//     }
}