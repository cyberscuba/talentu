<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Generalization of api responses
 *
 * Trait ApiResponses
 * @package App\Traits
 */
trait ApiResponses
{
    /**
     * Success response Api
     * @param $data
     * @return JsonResponse
     * Created by <Engineer>
     * User:      <Carlos Martinez>
     * Date:      12/05/22
     */
    protected function successResponse( $data, $code ){

        return new JsonResponse( $data, $code );
    }

    /**
     * Error response Api
     * @param $message
     * @param $code
     * @return JsonResponse
     * Created by <Engineer>
     * Created by <Engineer>
     * User:      <Carlos Martinez>
     * Date:      12/05/22
     */
    protected function errorResponse( $message, $code ){

        return new JsonResponse([ 'error' => $message, 'code' => $code], $code);
    }

    /**
     * Success response for a listing
     * @param array $collection
     * @param int $code
     * @return JsonResponse
     * Created by <Engineer>
     * Created by <Engineer>
     * User:      <Carlos Martinez>
     * Date:      12/05/22
     */
    protected function showAll( array $collection, $code = 200 ){

        return $this->successResponse( ['data' => $collection], $code );
    }

    /**
     * Success response for a entity
     * @param $entity
     * @param int $code
     * @return JsonResponse
     * Created by <Engineer>
     * Created by <Engineer>
     * User:      <Carlos Martinez>
     * Date:      12/05/22
     */
    protected function showOne( $entity, $code = 200 ){

        return $this->successResponse(['data' => $entity], $code );
    }
}
