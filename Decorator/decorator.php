<?php

namespace Decorator;

interface Component
{
	public function operation();
}

abstract class Decorator implements Component
{
	/**
	 *
	 * @var Component
	 */
	protected $component;
		
	function __construct(Component $component)
	{
		$this->component = $component;
	}
	
	abstract function operation();
	
}

class ConcreteComponent implements Component
{
	public function operation()
	{
		return 1;
	}
}

class ConcreteDecoratorOne extends Decorator
{
	public function operation()
	{
		return $this->component->operation() + 1;
	}

}

class ConcreteDecoratorTwo extends Decorator
{
	public function operation()
	{
		return $this->component->operation() + 2;
	}

}


$concreteComponent = new ConcreteComponent();
echo "Contrete Component Operation: " . $concreteComponent->operation() . "\r\n";
$concreteDecoratorOne = new ConcreteDecoratorOne($concreteComponent);
echo "Contrete Decorator Operation: " . $concreteDecoratorOne->operation() . "\r\n";
$concreteDecoratorTwo = new ConcreteDecoratorTwo($concreteDecoratorOne);
echo "Contrete Decorator Operation: " . $concreteDecoratorTwo->operation() . "\r\n";
