<?php

namespace App\Http\Controllers;

use App\DataTables\JobSeekerExperienceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJobSeekerExperienceRequest;
use App\Http\Requests\UpdateJobSeekerExperienceRequest;
use App\Repositories\JobSeekerExperienceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JobSeekerExperienceController extends AppBaseController
{
    /** @var  JobSeekerExperienceRepository */
    private $jobSeekerExperienceRepository;

    public function __construct(JobSeekerExperienceRepository $jobSeekerExperienceRepo)
    {
        $this->middleware('auth');
        $this->jobSeekerExperienceRepository = $jobSeekerExperienceRepo;
    }

    /**
     * Display a listing of the JobSeekerExperience.
     *
     * @param JobSeekerExperienceDataTable $jobSeekerExperienceDataTable
     * @return Response
     */
    public function index(JobSeekerExperienceDataTable $jobSeekerExperienceDataTable)
    {
        return $jobSeekerExperienceDataTable->render('job_seeker_experiences.index');
    }

    /**
     * Show the form for creating a new JobSeekerExperience.
     *
     * @return Response
     */
    public function create()
    {
        return view('job_seeker_experiences.create');
    }

    /**
     * Store a newly created JobSeekerExperience in storage.
     *
     * @param CreateJobSeekerExperienceRequest $request
     *
     * @return Response
     */
    public function store(CreateJobSeekerExperienceRequest $request)
    {
        $input = $request->all();

        $jobSeekerExperience = $this->jobSeekerExperienceRepository->create($input);

        Flash::success('Job Seeker Experience saved successfully.');

        return redirect(route('jobSeekerExperiences.index'));
    }

    /**
     * Display the specified JobSeekerExperience.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            Flash::error('Job Seeker Experience not found');

            return redirect(route('jobSeekerExperiences.index'));
        }

        return view('job_seeker_experiences.show')->with('jobSeekerExperience', $jobSeekerExperience);
    }

    /**
     * Show the form for editing the specified JobSeekerExperience.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            Flash::error('Job Seeker Experience not found');

            return redirect(route('jobSeekerExperiences.index'));
        }

        return view('job_seeker_experiences.edit')->with('jobSeekerExperience', $jobSeekerExperience);
    }

    /**
     * Update the specified JobSeekerExperience in storage.
     *
     * @param  int              $id
     * @param UpdateJobSeekerExperienceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobSeekerExperienceRequest $request)
    {
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            Flash::error('Job Seeker Experience not found');

            return redirect(route('jobSeekerExperiences.index'));
        }

        $jobSeekerExperience = $this->jobSeekerExperienceRepository->update($request->all(), $id);

        Flash::success('Job Seeker Experience updated successfully.');

        return redirect(route('jobSeekerExperiences.index'));
    }

    /**
     * Remove the specified JobSeekerExperience from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            Flash::error('Job Seeker Experience not found');

            return redirect(route('jobSeekerExperiences.index'));
        }

        $this->jobSeekerExperienceRepository->delete($id);

        Flash::success('Job Seeker Experience deleted successfully.');

        return redirect(route('jobSeekerExperiences.index'));
    }
}
