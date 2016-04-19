<?php
namespace Craft;

class QuickFormService extends BaseApplicationComponent
{
	public function getFormByKey($key)
	{
		$json = craft()->cache->get($this->_getCacheKey($key));
		$data = JsonHelper::decode($json);
		$form = QuickForm_FormModel::populateModel($data);

		
	}

	public function saveForm(QuickForm_FormModel $form)
	{
		$key = $form->getKey();
		$data = $form->getData();

		craft()->cache->add($this->_getCacheKey($key), $data, 0);
	}

	public function getSubmissionById($id)
	{

	}

	public function emailSubmission(QuickForm_SubmissionModel $submission, $emails = null)
	{

	}

	public function saveSubmission(QuickForm_SubmissionModel $submission)
	{

	}

	public function deleteSubmission(QuickForm_SubmissionModel $submission)
	{
		$this->deleteSubmissionById($submission->id);
	}

	public function deleteSubmissionById($id)
	{

	}

	public function sendSubmission(QuickForm_SubmissionModel $submission, $emails = null)
	{
		$this->saveSubmission($submission);
		$this->emailSubmission($submission);
	}

	private function _getCacheKey($key)
	{
		return 'quickForms_' . $key;
	}
}
