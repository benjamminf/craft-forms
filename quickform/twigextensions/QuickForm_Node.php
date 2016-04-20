<?php
namespace Craft;

class QuickForm_Node extends \Twig_Node
{
	public function __construct(\Twig_Node_Expression $handle, \Twig_Node_Expression $settings, \Twig_Node $body, $line, $tag = null)
	{
		parent::__construct(['handle' => $handle, 'settings' => $settings, 'body' => $body], [], $line, $tag);
	}

	public function compile(\Twig_Compiler $compiler)
	{
		$compiler
			->addDebugInfo($this)
			->write('$craft = \Craft\craft();')

			// Disallow nesting {% form %} tags
			->write('if(isset($context["quickForm"]))')
			->write('{')
				->write('throw new \Exception("Unable to nest form tags.");') // TODO Better error reporting
			->write('}')

			// Set the current context
			->write('$context["quickForm"] = [')
				->write('"handle" => ')->subcompile($this->getNode('handle'))->write(',')
				->write('"settings" => ')->subcompile($this->getNode('settings'))->write(',')
			->write('];')

			// Compile the body of the {% form %} tag and capture it's output
			->write('ob_start();')
			->subcompile($this->getNode('body'), false)
			->write('$body = ob_get_clean();')

			// Set the template rendering path to this plugins templates directory temporarily
			->write('$oldPath = $craft->templates->getTemplatesPath();')
			->write('$pluginsPath = rtrim($craft->path->getPluginsPath(), "/") . "/";')
			->write('$craft->templates->setTemplatesPath($pluginsPath . "quickform/templates");')

			// Render the form template with the compiled settings
			->write('echo $craft->templates->render("_tags/form", [')
				->write('"content" => $body,')
				->write('"key" => $context["quickForm"]["handle"],') // TODO Replace this with actual form key
				->write('"honeypot" => false,') // TODO Pass in actual setting
			->write(']);')

			// Revert the template rendering path to avoid probable issues
			->write('$craft->templates->setTemplatesPath($oldPath);')
		;
	}
}
