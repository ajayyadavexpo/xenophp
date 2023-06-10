<?php
namespace App\Middleware;

class Auth{
	public function handle(){
		if(!isset($_SESSION['user_id'])){
			redirect('login');
			exit();
		}
	}
}
