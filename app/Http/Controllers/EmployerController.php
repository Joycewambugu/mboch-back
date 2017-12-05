<?php

namespace App\Http\Controllers;

use App\DataTables\EmployerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Repositories\EmployerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EmployerController extends AppBaseController
{
    /** @var  EmployerRepository */
    private $employerRepository;

    public function __construct(EmployerRepository $employerRepo)
    {
        $this->middleware('auth');
        $this->employerRepository = $employerRepo;
    }

    /**
     * Display a listing of the Employer.
     *
     * @param EmployerDataTable $employerDataTable
     * @return Response
     */
    public function index(EmployerDataTable $employerDataTable)
    {
        return $employerDataTable->render('employers.index');
    }

    /**
     * Show the form for creating a new Employer.
     *
     * @return Response
     */
    public function create()
    {
        return view('employers.create');
    }

    /**
     * Store a newly created Employer in storage.
     *
     * @param CreateEmployerRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployerRequest $request)
    {
        $input = $request->all();

        $employer = $this->employerRepository->create($input);

        Flash::success('Employer saved successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Display the specified Employer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employers.show')->with('employer', $employer);
    }

    /**
     * Show the form for editing the specified Employer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employers.edit')->with('employer', $employer);
    }

    /**
     * Update the specified Employer in storage.
     *
     * @param  int              $id
     * @param UpdateEmployerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployerRequest $request)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $employer = $this->employerRepository->update($request->all(), $id);

        Flash::success('Employer updated successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Remove the specified Employer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $this->employerRepository->delete($id);

        Flash::success('Employer deleted successfully.');

        return redirect(route('employers.index'));
    }
}
