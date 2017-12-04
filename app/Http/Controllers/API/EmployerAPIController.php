<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployerAPIRequest;
use App\Http\Requests\API\UpdateEmployerAPIRequest;
use App\Models\Employer;
use App\Repositories\EmployerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EmployerController
 * @package App\Http\Controllers\API
 */

class EmployerAPIController extends AppBaseController
{
    /** @var  EmployerRepository */
    private $employerRepository;

    public function __construct(EmployerRepository $employerRepo)
    {
        $this->employerRepository = $employerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/employers",
     *      summary="Get a listing of the Employers.",
     *      tags={"Employer"},
     *      description="Get all Employers",
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
     *                  @SWG\Items(ref="#/definitions/Employer")
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
        $this->employerRepository->pushCriteria(new RequestCriteria($request));
        $this->employerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $employers = $this->employerRepository->all();

        return $this->sendResponse($employers->toArray(), 'Employers retrieved successfully');
    }

    /**
     * @param CreateEmployerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/employers",
     *      summary="Store a newly created Employer in storage",
     *      tags={"Employer"},
     *      description="Store Employer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Employer that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Employer")
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
     *                  ref="#/definitions/Employer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmployerAPIRequest $request)
    {
        $input = $request->all();

        $employers = $this->employerRepository->create($input);

        return $this->sendResponse($employers->toArray(), 'Employer saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/employers/{id}",
     *      summary="Display the specified Employer",
     *      tags={"Employer"},
     *      description="Get Employer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Employer",
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
     *                  ref="#/definitions/Employer"
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
        /** @var Employer $employer */
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        return $this->sendResponse($employer->toArray(), 'Employer retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEmployerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/employers/{id}",
     *      summary="Update the specified Employer in storage",
     *      tags={"Employer"},
     *      description="Update Employer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Employer",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Employer that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Employer")
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
     *                  ref="#/definitions/Employer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmployerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employer $employer */
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        $employer = $this->employerRepository->update($input, $id);

        return $this->sendResponse($employer->toArray(), 'Employer updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/employers/{id}",
     *      summary="Remove the specified Employer from storage",
     *      tags={"Employer"},
     *      description="Delete Employer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Employer",
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
        /** @var Employer $employer */
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        $employer->delete();

        return $this->sendResponse($id, 'Employer deleted successfully');
    }
}
