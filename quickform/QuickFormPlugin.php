<?php
namespace Craft;

/**
 * Class QuickFormPlugin
 *
 * Thank you for using Craft Quick Form!
 * @see https://github.com/benjamminf/craft-quick-form
 * @package Craft
 */
class QuickFormPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t("Quick Form");
	}

	public function getDescription()
	{
		return Craft::t("Quickly build front-end forms");
	}

	public function getVersion()
	{
		return '0.1.0';
	}

	public function getCraftMinimumVersion()
	{
		return '2.6';
	}

	public function getSchemaVersion()
	{
		return '0.1.0';
	}

	public function getDeveloper()
	{
		return 'Benjamin Fleming';
	}

	public function getDeveloperUrl()
	{
		return 'http://benjamminf.github.io';
	}

	public function getDocumentationUrl()
	{
		return 'https://github.com/benjamminf/craft-quick-form';
	}

	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/benjamminf/craft-quick-form/master/releases.json';
	}

	public function isCraftRequiredVersion()
	{
		return version_compare(craft()->getVersion(), $this->getCraftMinimumVersion(), '>=');
	}

	public function onBeforeInstall()
	{
		return $this->isCraftRequiredVersion();
	}
}
