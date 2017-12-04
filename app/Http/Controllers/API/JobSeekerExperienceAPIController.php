<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJobSeekerExperienceAPIRequest;
use App\Http\Requests\API\UpdateJobSeekerExperienceAPIRequest;
use App\Models\JobSeekerExperience;
use App\Repositories\JobSeekerExperienceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JobSeekerExperienceController
 * @package App\Http\Controllers\API
 */

class JobSeekerExperienceAPIController extends AppBaseController
{
    /** @var  JobSeekerExperienceRepository */
    private $jobSeekerExperienceRepository;

    public function __construct(JobSeekerExperienceRepository $jobSeekerExperienceRepo)
    {
        $this->jobSeekerExperienceRepository = $jobSeekerExperienceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/jobSeekerExperiences",
     *      summary="Get a listing of the JobSeekerExperiences.",
     *      tags={"JobSeekerExperience"},
     *      description="Get all JobSeekerExperiences",
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
     *                  @SWG\Items(ref="#/definitions/JobSeekerExperience")
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
        $this->jobSeekerExperienceRepository->pushCriteria(new RequestCriteria($request));
        $this->jobSeekerExperienceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jobSeekerExperiences = $this->jobSeekerExperienceRepository->all();

        return $this->sendResponse($jobSeekerExperiences->toArray(), 'Job Seeker Experiences retrieved successfully');
    }

    /**
     * @param CreateJobSeekerExperienceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/jobSeekerExperiences",
     *      summary="Store a newly created JobSeekerExperience in storage",
     *      tags={"JobSeekerExperience"},
     *      description="Store JobSeekerExperience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JobSeekerExperience that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/JobSeekerExperience")
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
     *                  ref="#/definitions/JobSeekerExperience"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateJobSeekerExperienceAPIRequest $request)
    {
        $input = $request->all();

        $jobSeekerExperiences = $this->jobSeekerExperienceRepository->create($input);

        return $this->sendResponse($jobSeekerExperiences->toArray(), 'Job Seeker Experience saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/jobSeekerExperiences/{id}",
     *      summary="Display the specified JobSeekerExperience",
     *      tags={"JobSeekerExperience"},
     *      description="Get JobSeekerExperience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeekerExperience",
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
     *                  ref="#/definitions/JobSeekerExperience"
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
        /** @var JobSeekerExperience $jobSeekerExperience */
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            return $this->sendError('Job Seeker Experience not found');
        }

        return $this->sendResponse($jobSeekerExperience->toArray(), 'Job Seeker Experience retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateJobSeekerExperienceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/jobSeekerExperiences/{id}",
     *      summary="Update the specified JobSeekerExperience in storage",
     *      tags={"JobSeekerExperience"},
     *      description="Update JobSeekerExperience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeekerExperience",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JobSeekerExperience that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/JobSeekerExperience")
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
     *                  ref="#/definitions/JobSeekerExperience"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateJobSeekerExperienceAPIRequest $request)
    {
        $input = $request->all();

        /** @var JobSeekerExperience $jobSeekerExperience */
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            return $this->sendError('Job Seeker Experience not found');
        }

        $jobSeekerExperience = $this->jobSeekerExperienceRepository->update($input, $id);

        return $this->sendResponse($jobSeekerExperience->toArray(), 'JobSeekerExperience updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/jobSeekerExperiences/{id}",
     *      summary="Remove the specified JobSeekerExperience from storage",
     *      tags={"JobSeekerExperience"},
     *      description="Delete JobSeekerExperience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeekerExperience",
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
        /** @var JobSeekerExperience $jobSeekerExperience */
        $jobSeekerExperience = $this->jobSeekerExperienceRepository->findWithoutFail($id);

        if (empty($jobSeekerExperience)) {
            return $this->sendError('Job Seeker Experience not found');
        }

        $jobSeekerExperience->delete();

        return $this->sendResponse($id, 'Job Seeker Experience deleted successfully');
    }
}
