<?php

namespace NiuModule\Noticias;

use Niu\Module\Modules\RoutedModule,
	Niu\Router\Routes\LiteralRoute,
	Niu\Router\Routes\SymbolicRoute,
	Niu\Router\Redirects\URL,
	Niu\Router\Redirects\Controller;

class NoticiasModule extends RoutedModule {

	protected function loadRoutes() {
		$this->addRoute(new LiteralRoute('/', new Controller('Noticias', 'Index', 'index')));
		$this->addRoute(new LiteralRoute('/update', new Controller('Noticias', 'Index', 'update')));
		$this->addRoute(new LiteralRoute('/google', new URL('http://www.google.com')));
		$this->addRoute(new LiteralRoute('/mail', new URL('http://www.gmail.com')));
		/*$this->addRoute(new SymbolicRoute('/noticia/:id/delete', array(
				'id' => '[1-9]\d+' # Aceita qual quer número que NÃO seja iniciado em zero
			), new URL('http://localhost:8081/delete')));*/
		$this->addRoute(new SymbolicRoute('/noticia/:id/update[/:avisa]', array(
				'id' => '[1-9]\d+', # Aceita qual quer número que NÃO seja iniciado em zero
				'avisa' => '(sim|nao)'
			), new URL('http://localhost:8081/update')));
	}

}