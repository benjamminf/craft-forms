<?php
namespace Craft;

class QuickForm_FormModel extends BaseModel
{
	public function getKey()
	{
		$data = $this->getData();

		return md5(JsonHelper::encode($data));
	}

	public function getData()
	{
		$fields = [];

		foreach($this->fields as $field)
		{
			$fieldData = $field->getData();
			$fieldData['__model__'] = 'QuickForm_FieldModel';
			$fields[] = $fieldData;
		}

		return [
			'handle' => $this->handle,
			'name' => $this->name,
			'redirect' => $this->redirect,
			'email' => $this->email,
			'fields' => $fields,
		];
	}

	protected function defineAttributes()
	{
		return [
			'handle' => AttributeType::Handle,
			'name' => AttributeType::String,
			'redirect' => AttributeType::Url,
			'email' => [AttributeType::Bool, 'default' => false],
			'fields' => [AttributeType::Mixed, 'default' => []],
		];
	}
}
