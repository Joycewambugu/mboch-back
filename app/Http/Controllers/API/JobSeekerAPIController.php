<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJobSeekerAPIRequest;
use App\Http\Requests\API\UpdateJobSeekerAPIRequest;
use App\Models\JobSeeker;
use App\Repositories\JobSeekerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JobSeekerController
 * @package App\Http\Controllers\API
 */

class JobSeekerAPIController extends AppBaseController
{
    /** @var  JobSeekerRepository */
    private $jobSeekerRepository;

    public function __construct(JobSeekerRepository $jobSeekerRepo)
    {
        $this->jobSeekerRepository = $jobSeekerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/jobSeekers",
     *      summary="Get a listing of the JobSeekers.",
     *      tags={"JobSeeker"},
     *      description="Get all JobSeekers",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/JobSeeker")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->jobSeekerRepository->pushCriteria(new RequestCriteria($request));
        $this->jobSeekerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jobSeekers = $this->jobSeekerRepository->all();

        return $this->sendResponse($jobSeekers->toArray(), 'Job Seekers retrieved successfully');
    }

    /**
     * @param CreateJobSeekerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/jobSeekers",
     *      summary="Store a newly created JobSeeker in storage",
     *      tags={"JobSeeker"},
     *      description="Store JobSeeker",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JobSeeker that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/JobSeeker")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/JobSeeker"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateJobSeekerAPIRequest $request)
    {
        $input = $request->all();

        $jobSeekers = $this->jobSeekerRepository->create($input);

        return $this->sendResponse($jobSeekers->toArray(), 'Job Seeker saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/jobSeekers/{id}",
     *      summary="Display the specified JobSeeker",
     *      tags={"JobSeeker"},
     *      description="Get JobSeeker",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeeker",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/JobSeeker"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var JobSeeker $jobSeeker */
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            return $this->sendError('Job Seeker not found');
        }

        return $this->sendResponse($jobSeeker->toArray(), 'Job Seeker retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateJobSeekerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/jobSeekers/{id}",
     *      summary="Update the specified JobSeeker in storage",
     *      tags={"JobSeeker"},
     *      description="Update JobSeeker",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeeker",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JobSeeker that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/JobSeeker")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/JobSeeker"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateJobSeekerAPIRequest $request)
    {
        $input = $request->all();

        /** @var JobSeeker $jobSeeker */
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            return $this->sendError('Job Seeker not found');
        }

        $jobSeeker = $this->jobSeekerRepository->update($input, $id);

        return $this->sendResponse($jobSeeker->toArray(), 'JobSeeker updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/jobSeekers/{id}",
     *      summary="Remove the specified JobSeeker from storage",
     *      tags={"JobSeeker"},
     *      description="Delete JobSeeker",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeeker",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var JobSeeker $jobSeeker */
        $jobSeeker = $this->jobSeekerRepository->findWithoutFail($id);

        if (empty($jobSeeker)) {
            return $this->sendError('Job Seeker not found');
        }

        $jobSeeker->delete();

        return $this->sendResponse($id, 'Job Seeker deleted successfully');
    }
}
