<?php

class PostsController extends ApplicationController {
	
	function __constructor(){
	}
	
	
	public function index(){
		$posts = User::all();
		$posts = $posts->to_json();
		$posts = json_decode($posts);
		$this->view->set('posts', $posts);
		$this->view->render();
	}
	
	public function show(){
		
	}
	
	public function edit(){
		
	}
	
	public function destroy(){
		
	}
}

?>