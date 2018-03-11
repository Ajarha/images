<?php

namespace Brabijan\Images;

use Nette;

/**
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 * @author Jan Brabec <brabijan@gmail.com>
 */
trait TImagePipe
{

	/** @var ImagePipe */
	public $imgPipe;



	/**
	 * @param ImagePipe $imgPipe
	 */
	public function injectImgPipe(ImagePipe $imgPipe)
	{
		$this->imgPipe = $imgPipe;
	}



	/**
	 * @param string $class
	 *
	 * @return Nette\Application\UI\ITemplate
	 */
	protected function createTemplate($class = NULL)
	{
		$template = parent::createTemplate($class);
		/** @var \Nette\Application\UI\ITemplate|\stdClass $template */
		$template->_imagePipe = $this->imgPipe;

		return $template;
	}



	protected function registerTexyMacros(\Texy $texy)
	{
		Macros\Texy::register($texy, $this->imgPipe);
	}

}