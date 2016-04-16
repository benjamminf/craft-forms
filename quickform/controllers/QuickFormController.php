<?php
namespace Craft;

class QuickFormController extends BaseController
{
	protected $allowAnonymous = ['submitForm'];

	public function actionSubmitForm()
	{
		$this->requirePostRequest();

		$submission = $this->_createSubmissionFromPost();
	}

	private function _createFormFromPost()
	{
		$key = craft()->request->getPost('key');


		return false;
	}

	private function _createSubmissionFromPost()
	{
		$fields = craft()->request->getPost('fields');
	}
}
