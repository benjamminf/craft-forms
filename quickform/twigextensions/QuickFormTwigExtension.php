<?php
namespace Craft;

require_once 'QuickForm_TokenParser.php';

class QuickFormTwigExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'quickform';
	}

	public function getTokenParsers()
	{
		return array(
			new QuickForm_TokenParser(),
		);
	}
}
