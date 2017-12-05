<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJobSeekerRefereeAPIRequest;
use App\Http\Requests\API\UpdateJobSeekerRefereeAPIRequest;
use App\Models\JobSeekerReferee;
use App\Repositories\JobSeekerRefereeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JobSeekerRefereeController
 * @package App\Http\Controllers\API
 */

class JobSeekerRefereeAPIController extends AppBaseController
{
    /** @var  JobSeekerRefereeRepository */
    private $jobSeekerRefereeRepository;

    public function __construct(JobSeekerRefereeRepository $jobSeekerRefereeRepo)
    {
        $this->jobSeekerRefereeRepository = $jobSeekerRefereeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/jobSeekerReferees",
     *      summary="Get a listing of the JobSeekerReferees.",
     *      tags={"JobSeekerReferee"},
     *      description="Get all JobSeekerReferees",
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
     *                  @SWG\Items(ref="#/definitions/JobSeekerReferee")
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
        $this->jobSeekerRefereeRepository->pushCriteria(new RequestCriteria($request));
        $this->jobSeekerRefereeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jobSeekerReferees = $this->jobSeekerRefereeRepository->all();

        return $this->sendResponse($jobSeekerReferees->toArray(), 'Job Seeker Referees retrieved successfully');
    }

    /**
     * @param CreateJobSeekerRefereeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/jobSeekerReferees",
     *      summary="Store a newly created JobSeekerReferee in storage",
     *      tags={"JobSeekerReferee"},
     *      description="Store JobSeekerReferee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JobSeekerReferee that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/JobSeekerReferee")
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
     *                  ref="#/definitions/JobSeekerReferee"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateJobSeekerRefereeAPIRequest $request)
    {
        $input = $request->all();

        $jobSeekerReferees = $this->jobSeekerRefereeRepository->create($input);

        return $this->sendResponse($jobSeekerReferees->toArray(), 'Job Seeker Referee saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/jobSeekerReferees/{id}",
     *      summary="Display the specified JobSeekerReferee",
     *      tags={"JobSeekerReferee"},
     *      description="Get JobSeekerReferee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeekerReferee",
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
     *                  ref="#/definitions/JobSeekerReferee"
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
        /** @var JobSeekerReferee $jobSeekerReferee */
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            return $this->sendError('Job Seeker Referee not found');
        }

        return $this->sendResponse($jobSeekerReferee->toArray(), 'Job Seeker Referee retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateJobSeekerRefereeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/jobSeekerReferees/{id}",
     *      summary="Update the specified JobSeekerReferee in storage",
     *      tags={"JobSeekerReferee"},
     *      description="Update JobSeekerReferee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeekerReferee",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JobSeekerReferee that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/JobSeekerReferee")
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
     *                  ref="#/definitions/JobSeekerReferee"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateJobSeekerRefereeAPIRequest $request)
    {
        $input = $request->all();

        /** @var JobSeekerReferee $jobSeekerReferee */
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            return $this->sendError('Job Seeker Referee not found');
        }

        $jobSeekerReferee = $this->jobSeekerRefereeRepository->update($input, $id);

        return $this->sendResponse($jobSeekerReferee->toArray(), 'JobSeekerReferee updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/jobSeekerReferees/{id}",
     *      summary="Remove the specified JobSeekerReferee from storage",
     *      tags={"JobSeekerReferee"},
     *      description="Delete JobSeekerReferee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of JobSeekerReferee",
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
        /** @var JobSeekerReferee $jobSeekerReferee */
        $jobSeekerReferee = $this->jobSeekerRefereeRepository->findWithoutFail($id);

        if (empty($jobSeekerReferee)) {
            return $this->sendError('Job Seeker Referee not found');
        }

        $jobSeekerReferee->delete();

        return $this->sendResponse($id, 'Job Seeker Referee deleted successfully');
    }
}
