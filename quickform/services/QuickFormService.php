<?php
namespace Craft;

class QuickFormService extends BaseApplicationComponent
{
	public function getFormById($id)
	{

	}

	public function getFormByHandle($handle)
	{

	}

	public function saveForm(QuickForm_FormModel $form)
	{

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
}
