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
	 * @covers \ASCII\Http\Response::__construct
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
	
	/**
	 * @covers \ASCII\Http\Response::__construct
	 * @dataProvider constructProvider
	 * @expectedException \TypeError
	 */
	public function testSetStatusException($status, $reason) 
	{
		$this->getResponse()->setStatus($status, $reason);
	}
	
	/**
	 * @covers \ASCII\Http\Response::__construct
	 * @covers \ASCII\Http\Response::setStatus
	 * @covers \ASCII\Http\Response::getStatus
	 */
	public function testSetStatus()
	{
		// on veut vérifier qu'après un setter les attributs évoluent
		$response = (new \ReflectionClass(Response::class))->newInstanceArgs([]);
		$response->setStatus(777, "Lucky");
		// on vérifie status
		$this->assertTrue("HTTP/1.1 777 Lucky" === $response->getStatus());
		
	}
	
	
	
	
	
	
	
}