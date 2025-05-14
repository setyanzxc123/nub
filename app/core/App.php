<?php
class App
{

	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseURL();


		//controller
		session_start();
		if (isset($_SESSION['rs_pengguna_id_ex'])) {
			if ($_SESSION['rs_pengguna_id_ex'] == "") {
				$this->controller = "masuk";
			} else {
				if (isset($url[0])) {
					if (file_exists('./app/controllers/' . $url[0] . '.php')) {
						$this->controller = $url[0];
						unset($url[0]);
					}
				}
			}
		} else {
			$this->controller = "masuk";
		}

		require_once './app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		//method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//params
		if (!empty($url)) {
			$this->params = array_values($url);
		}

		//Jalankan controller & method serta parameter jika ada

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;

		}
	}
}
?>