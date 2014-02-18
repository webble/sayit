<?php

Article::creating(function(Article $article) {

	Input::merge(array('user' => 'boy@swis.nl'));

	$user = UserRepository::fromInput();
	$article->user_id 	= $user->id;
	$article->html 		= Markdown::string($article->markdown);

});