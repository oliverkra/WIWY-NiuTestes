<?php

namespace NiuModule\Noticias\Controllers;

use Niu\Module\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction() {
		header('X-XSS-Protection: 1; mode=block');
		header('X-Content-Type-Options: nosniff');
		header('X-Frame-Options: SAMEORIGIN');
		vl('Hello World');
	}

	public function updateAction() {
		vl('Yes! Update ;D');
	}

}