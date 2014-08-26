<?php

use HACKson\Forms\PublishStatusForm;
use HACKson\Statuses\PublishStatusCommand;
use HACKson\Statuses\StatusRepository;

class StatusesController extends \BaseController {


    /**
     * @var HACKson\Statuses\StatusRepository
     */
    protected  $statusRepository;
    /**
     * @var HACKson\Forms\PublishStatusForm
     */
    protected $publishStatusForm;

    function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;
    }


    /**
	 * Display a listing of the resource.
	 * GET /status
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getFeedForUser(Auth::user());

		return View::make('statuses.index')->withStatuses($statuses);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /status/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /status
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);

        Flash::message('Din status har nu postats!');

        return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /status/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /status/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /status/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /status/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}