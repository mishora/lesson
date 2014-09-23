<?php

class PagesController extends \BaseController {

	/**
	 * Show Home page
	 *
	 * @return void
	 **/
	public function home (){
		return View::make('pages.home');
	}

}
