<?php

namespace App\Http\Controllers;

use App\DataTables\JobSeekerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJobSeekerRequest;
use App\Http\Requests\UpdateJobSeekerRequest;
use App\Repositories\JobSeekerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JobSeekerController extends AppBaseController
{
    /** @var  JobSeekerRepository */
    private $jobSeekerRepository;

    public function __construct(JobSeekerRepository $jobSeekerRepo)
    {
        $this->jobSeekerRepository = $jobSeekerRepo;
    }

    /**
     * Display a listing of the JobSeeker.
     *
     * @param JobSeekerDataTable $jobSeekerDataTable
     * @return Response
     */
    public function index(JobSeekerDataTable $jobSeekerDataTable)
    {
        return $jobSeekerDataTable->render('job_seekers.index');
    }

    /**
     * Show the form for creating a new JobSeeker.
     *
     * @return Response
     */
    public function create()
    {
        return view('job_seekers.create');
    }

    /**
     * Store a newly created JobSeeker in storage.
     *
     * @param CreateJobSeekerRequest $request
     *
     * @return Response
     */
    public function store(CreateJobSeekerRequest $request)
    {
        $input = $request->all();

        $jobSeeker = $this->jobSeekerRepository->create($input);

        Flash::success('Job Seeker saved successfully.');

        return redirect(route('jobSeekers.index'));
    }

    /**
     * Display the specified JobSeeker.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            Flash::error('Job Seeker not found');

            return redirect(route('jobSeekers.index'));
        }

        return view('job_seekers.show')->with('jobSeeker', $jobSeeker);
    }

    /**
     * Show the form for editing the specified JobSeeker.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            Flash::error('Job Seeker not found');

            return redirect(route('jobSeekers.index'));
        }

        return view('job_seekers.edit')->with('jobSeeker', $jobSeeker);
    }

    /**
     * Update the specified JobSeeker in storage.
     *
     * @param  int              $id
     * @param UpdateJobSeekerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobSeekerRequest $request)
    {
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            Flash::error('Job Seeker not found');

            return redirect(route('jobSeekers.index'));
        }

        $jobSeeker = $this->jobSeekerRepository->update($request->all(), $id);

        Flash::success('Job Seeker updated successfully.');

        return redirect(route('jobSeekers.index'));
    }

    /**
     * Remove the specified JobSeeker from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            Flash::error('Job Seeker not found');

            return redirect(route('jobSeekers.index'));
        }

        $this->jobSeekerRepository->delete($id);

        Flash::success('Job Seeker deleted successfully.');

        return redirect(route('jobSeekers.index'));
    }
}
