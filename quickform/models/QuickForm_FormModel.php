<?php
namespace Craft;

class QuickForm_FormModel extends BaseModel
{
	protected function defineAttributes()
	{
		return [
			'handle' => AttributeType::Handle,
			'name' => AttributeType::String,
			'redirect' => AttributeType::Url,
			'email' => AttributeType::Bool,

		];
	}
}
