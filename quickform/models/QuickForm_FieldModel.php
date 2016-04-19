<?php
namespace Craft;

class QuickForm_FieldModel extends BaseModel
{
	public function getData()
	{
		return [
			'handle' => $this->handle,
			'name' => $this->name,
			'type' => $this->type,
			'required' => $this->required,
		];
	}

	protected function defineAttributes()
	{
		return [
			'handle' => AttributeType::Handle,
			'name' => AttributeType::String,
			'type' => AttributeType::String,
			'required' => [AttributeType::Bool, 'default' => false],
		];
	}
}
