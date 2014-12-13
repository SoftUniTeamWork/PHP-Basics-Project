<?php

class PagesController extends \BaseController {

	public function index()
	{
		return View::make("index");
	}

	public function showLogin()
	{
		return View::make('pages.login');
	}

	public function doLogin()
	{

	}
}
