<?php

namespace NiuModule\OnlineOracle;

use Niu\Module\Modules\RoutedModule,
	Niu\Router\Routes\LiteralRoute,
	Niu\Router\Routes\SymbolicRoute,
	Niu\Router\Redirects\URL,
	Niu\Router\Redirects\Controller;

class OnlineOracleModule extends RoutedModule {

	protected function loadRoutes() {
		$this->addRoute(new SymbolicRoute('/projetos[:projeto]', array(
				'id' => '[1-9]\d+', # Aceita qual quer número que NÃO seja iniciado em zero
				'avisa' => '(sim|nao)'
			), new Controller('OnlineOracle', 'Index', 'index')));
	}

}