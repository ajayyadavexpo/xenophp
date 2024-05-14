<?php
namespace App\Controllers;

class DashboardController{
	public function index(){
		$posts = [
			['id'=>1,'title'=>'Post title','content'=>'Post content'],
			['id'=>2,'title'=>'Post title','content'=>'Post content'],
			['id'=>3,'title'=>'Post title','content'=>'Post content'],
		];

		view('dashboard',[
			'user_posts'=>$posts,
			'name' => $_SESSION['user_name']
		]);
	}

	public function logout(){
		$_SESSION = [];
		session_destroy();
		redirect('login');
	}
}