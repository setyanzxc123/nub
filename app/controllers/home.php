<?php
class Home extends Controller
{
	private $idForm = 'masukPengguna';
	private $urlForm = '';
	private $methodForm = 'authmasuk';
	private $data = [];

	public function __construct()
	{
		$this->data['loadingTitle'] = '';
	}

	public function index()
	{
		$this->data['WebTitle'] = 'BERANDA';
		$this->view('templates/header', $this->data);
		$this->view('templates/anotherScript', $this->data);
		$this->view('home/index');

		$this->view('templates/footer');
	}
}
?>