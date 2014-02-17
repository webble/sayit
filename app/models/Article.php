<?php

class Article extends Eloquent
{
	protected $table = 'article';

	protected $fillable = array('title', 'markdown');

	protected $guarded = array('id');

	public static $rules = array(
		'title' => 'required',
		'markdown' => 'required',
	);

	public static $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
		'on_update'  => true,
	);
}
