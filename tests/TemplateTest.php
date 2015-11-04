<?php
namespace Bricks\TemplateEngine\Php;
require_once('Template.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class TemplateTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Template Шаблонизатор.
	 */
	private $template;

	public function setUp(){
    $this->template = new Template('tests/template.tpl');
  }

  /**
   * Должен устанавливать переменные шаблона.
   */
  public function testEnv(){
    $this->template->env(['test' => 'Hello']);
    $this->assertEquals('<html>Hello</html>' . "\n", (string)$this->template);
  }

  /**
   * Должен рендерить шаблон.
   */
  public function testToString(){
    $this->template->test = 'Hello';
    $this->assertEquals('<html>Hello</html>' . "\n", (string)$this->template);
  }
}
