<?php

namespace Salabun;

/**
 * 	Супер крута штука, щоб генерувати код:
 * 	Версія 1.01
 */
class CodeWriter 
{
	public function __construct() 
	{
		$this->string = '';
		$this->pre = false;
		$this->defaultSpaces = 0;
		$this->spaces = 0;
	}
	
	/** 
	 *	Задає мінімальну кількість пробілів для всіх рядків:
	 */
	public function defaultSpaces($spaces = 0) 
	{
		$this->defaultSpaces = $spaces;
		return $this;
	}
	
	/** 
	 *	Усі наступні рядки міститимуть вказану кількість пробілів:
	 */
	public function s($spaces) 
	{
		$this->spaces = $spaces;
		return $this;
	}
	
	/** 
	 *	Генерація необхідної кількості пробілів:
	 */
	public function printSpaces($spaces) 
	{
		$string = '';
		
		for($i = 1; $i <= $spaces; $i++) {
			$string .= ' ';
		}
		
		return $string;
	}

	/** 
	 *	Порожній рядок:
	 */
	public function br($spaces = 0) 
	{
		$this->line('');
		return $this;
	}
	
	/** 
	 *	Обернути весь код в теги <pre>...</pre>:
	 */
	public function pre() 
	{
		$this->pre = true;
		return $this;
	}
	
	/** 
	 *	Додати рядок:
	 */
	public function line($string) 
	{
		$this->string .= $this->printSpaces($this->defaultSpaces + $this->spaces) . $string . PHP_EOL;
		return $this;
	}
    
	/** 
	 *	Додати багато рядків:
	 */
	public function lines($array) 
	{
		foreach($array as $string) {
            $this->string .= $this->printSpaces($this->defaultSpaces + $this->spaces) . $string . PHP_EOL;
        }
		return $this;
	}
	
	/** 
	 *	Отримати весь згенерований код:
	 */
	public function getCode() 
	{
		if($this->pre == true) {
			return '<pre>'. PHP_EOL . $this->string . '</pre>';
		} else {
			return $this->string;
		}
	}
	
}