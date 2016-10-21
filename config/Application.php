<?php

namespace NiuConfig;

use Niu\Loader\Applications\RoutedApplication,
	Niu\Router\Routes\LiteralRoute;

class Application extends RoutedApplication {

	protected function loadModules() {
		$this->addModule(new \NiuModule\Noticias\NoticiasModule());
		$this->addModule(new \NiuModule\OnlineOracle\OnlineOracleModule());
	}

}