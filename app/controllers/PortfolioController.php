<?php

class PortfolioController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $portfolios = Post::where('category_id','=','1')->get();
        return View::make('admin.portfolio.index')->with('portfolios', $portfolios);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
    	$portfolio = new Post();
        return View::make('admin.portfolio.form')->with('portfolio', $portfolio);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        $input = Input::all();
        $portfolio = new Post($input);
        $portfolio->category_id = '1';
        $portfolio->save();
        return Redirect::to('/admin/portfolio/index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getView($id)
	{
    	$portfolio = Post::find($id);
        if ($portfolio == null) return App::abort(404);
        return View::make('portfolio.view')->with('portfolio', $portfolio);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUpdate($id)
	{
    	$portfolio = Post::find($id);
        return View::make('admin.portfolio.form')->with('portfolio', $portfolio);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
        $input = Input::all();
        $portfolio = Post::find($id);
        if ($portfolio == null) App::abort(404);
        $portfolio->fill($input);
        $portfolio->save();
        return Redirect::to('/admin/portfolio/index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
        $portfolio = Post::find($id);
        $portfolio->delete();
        return Redirect::to('/admin/portfolio/index');
	}


}
