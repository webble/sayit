<?php

class Article extends Eloquent
{
	protected $table = 'article';

	protected $guarded = array();

	public static $rules = array();

	public static $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
	);
}
