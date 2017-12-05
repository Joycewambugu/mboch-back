<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobSeekerRefereeRequest;
use App\Http\Requests\UpdateJobSeekerRefereeRequest;
use App\Repositories\JobSeekerRefereeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JobSeekerRefereeController extends AppBaseController
{
    /** @var  JobSeekerRefereeRepository */
    private $jobSeekerRefereeRepository;

    public function __construct(JobSeekerRefereeRepository $jobSeekerRefereeRepo)
    {
        $this->jobSeekerRefereeRepository = $jobSeekerRefereeRepo;
    }

    /**
     * Display a listing of the JobSeekerReferee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jobSeekerRefereeRepository->pushCriteria(new RequestCriteria($request));
        $jobSeekerReferees = $this->jobSeekerRefereeRepository->all();

        return view('job_seeker_referees.index')
            ->with('jobSeekerReferees', $jobSeekerReferees);
    }

    /**
     * Show the form for creating a new JobSeekerReferee.
     *
     * @return Response
     */
    public function create()
    {
        return view('job_seeker_referees.create');
    }

    /**
     * Store a newly created JobSeekerReferee in storage.
     *
     * @param CreateJobSeekerRefereeRequest $request
     *
     * @return Response
     */
    public function store(CreateJobSeekerRefereeRequest $request)
    {
        $input = $request->all();

        $jobSeekerReferee = $this->jobSeekerRefereeRepository->create($input);

        Flash::success('Job Seeker Referee saved successfully.');

        return redirect(route('jobSeekerReferees.index'));
    }

    /**
     * Display the specified JobSeekerReferee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            Flash::error('Job Seeker Referee not found');

            return redirect(route('jobSeekerReferees.index'));
        }

        return view('job_seeker_referees.show')->with('jobSeekerReferee', $jobSeekerReferee);
    }

    /**
     * Show the form for editing the specified JobSeekerReferee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            Flash::error('Job Seeker Referee not found');

            return redirect(route('jobSeekerReferees.index'));
        }

        return view('job_seeker_referees.edit')->with('jobSeekerReferee', $jobSeekerReferee);
    }

    /**
     * Update the specified JobSeekerReferee in storage.
     *
     * @param  int              $id
     * @param UpdateJobSeekerRefereeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobSeekerRefereeRequest $request)
    {
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            Flash::error('Job Seeker Referee not found');

            return redirect(route('jobSeekerReferees.index'));
        }

        $jobSeekerReferee = $this->jobSeekerRefereeRepository->update($request->all(), $id);

        Flash::success('Job Seeker Referee updated successfully.');

        return redirect(route('jobSeekerReferees.index'));
    }

    /**
     * Remove the specified JobSeekerReferee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            Flash::error('Job Seeker Referee not found');

            return redirect(route('jobSeekerReferees.index'));
        }

        $this->jobSeekerRefereeRepository->delete($id);

        Flash::success('Job Seeker Referee deleted successfully.');

        return redirect(route('jobSeekerReferees.index'));
    }
}
