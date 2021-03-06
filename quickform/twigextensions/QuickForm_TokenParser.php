<?php
namespace Craft;

require_once 'QuickForm_Node.php';

class QuickForm_TokenParser extends \Twig_TokenParser
{
	public function getTag()
	{
		return 'form';
	}

	public function parse(\Twig_Token $token)
	{
		$parser = $this->parser;
		$stream = $parser->getStream();

		$handle = $parser->getExpressionParser()->parseExpression();
		$settings = $parser->getExpressionParser()->parseExpression();

		$stream->expect(\Twig_Token::BLOCK_END_TYPE);

		$body = $parser->subparse([$this, 'decideEnd']);

		$stream->next();
		$stream->expect(\Twig_Token::BLOCK_END_TYPE);

		return new QuickForm_Node(
			$handle,
			$settings,
			$body,
			$token->getLine(),
			$this->getTag()
		);
	}

	public function decideEnd(\Twig_Token $token)
	{
		return $token->test(['endform']);
	}
}
