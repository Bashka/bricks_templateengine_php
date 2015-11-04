<?php
namespace Bricks\TemplateEngine\Php;

/**
 * Шаблонизатор, использующий PHP интерпретатор для рендеринга.
 *
 * @author Artur Sh. Mamedbekov
 */
class Template{
  /**
   * @var string Адрес файла шаблона.
   */
  private $file;

  /**
   * @var array Переменные окружения шаблона, используемые для рендеринга.
   */
  private $env = [];

  /**
   * @param string $file Адрес файла шаблона.
   */
  public function __construct($file){
		$this->file = $file;
  }

  public function __set($name, $value){
    $this->env[$name] = $value;
  }

  /**
   * Устанавливает переменные окружения шаблона.
   *
   * @param array $env Переменные окружения шаблона в виде ассоциативного 
   * массива.
   *
   * @return Template Вызываемый объект.
   */
  public function env(array $env){
    $this->env = array_merge($this->env, $env);
    return $this;
  }

  public function __toString(){
    extract($this->env);
    ob_start();
    include($this->file);
    return ob_get_clean();
  }
}
