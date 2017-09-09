<?php

namespace CarFeature;

interface Car
{
	public function cost();
	
	public function description();
}

abstract class CarFeature implements Car
{
	/**
	 *
	 * @var Car
	 */
	protected $car;
		
	function __construct(Car $car)
	{
		$this->car = $car;
	}
	
	abstract function cost();
	
	abstract function description();
	
}

class Suv implements Car
{
	public function cost()
	{
		return 30000;
	}

	public function description()
	{
		return "Suv";
	}
}

class SunRoof extends CarFeature
{
	public function cost()
	{
		return $this->car->cost() + 1500;
	}

	public function description()
	{
		return $this->car->description() . ", sunroof";
	}
}

class HighEndWheels extends CarFeature
{
	public function cost()
	{
		return $this->car->cost() + 2000;
	}

	public function description()
	{
		return $this->car->description() . ", high end wheels";
	}
}


$concreteComponent = new Suv();
echo "Contrete Component Operation 1: " . $concreteComponent->cost() . "\r\n";
echo "Contrete Component Operation 2: " . $concreteComponent->description() . "\r\n";
$concreteDecoratorOne = new SunRoof($concreteComponent);
echo "Contrete Decorator One Operation 1: " . $concreteDecoratorOne->cost() . "\r\n";
echo "Contrete Decorator One Operation 2: " . $concreteDecoratorOne->description() . "\r\n";
$concreteDecoratorTwo = new HighEndWheels($concreteDecoratorOne);
echo "Contrete Decorator Two Operation 1: " . $concreteDecoratorTwo->cost() . "\r\n";
echo "Contrete Decorator Two Operation 2: " . $concreteDecoratorTwo->description() . "\r\n";
