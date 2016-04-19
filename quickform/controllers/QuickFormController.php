<?php
namespace Craft;

class QuickFormController extends BaseController
{
	protected $allowAnonymous = ['submitForm'];

	public function actionSubmitForm()
	{
		$this->requirePostRequest();

		$key = craft()->request->getPost('key');
		$form = craft()->quickForm->getFormByKey($key);

		$submission = $this->_createSubmissionFromPost();
	}

	private function _createSubmissionFromPost()
	{
		$fields = craft()->request->getPost('fields');
	}
}
