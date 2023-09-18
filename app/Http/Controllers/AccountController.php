<?php

namespace App\Http\Controllers;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="API Template", version="0.1")
 */
class TemplateController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/template/{id}",
     *      operationId="retrieve",
     *      tags={"Template"},
     *      summary="Get account information",
     *      description="Returns account data",
     *      @OA\Parameter(name="id",description="Account id",required=true,in="path"),
     *      @OA\Response(response=200, description="successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Account not found."),
     *      @OA\Response(response=409, description="Conflict"),
     *      @OA\Response(response=500, description="Servor Error"),
     *      security={{"bearer_token":{}}}
     * )
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
//            $resultSet = Account::select('*')
//                ->where('id', $request->id);
//
//            $this->filter($resultSet, ['deleted']);
//
//            $account = $resultSet->first();
//
//            if (empty($account)) {
//                throw new ModelNotFoundException('Account not found.', 404);
//            }
//
//            MailCreatedJob::dispatch([
//                'to' => $account->email,
//                'subject' => "Bienvenue chez Collect&Verything ". $account->first_name,
//                'template_id' => env('MAIL_TEMPLATE_WELCOME'),
//            ])->onQueue('email_created');
//
//            return response()->json($account, 200);
        }
        catch (ValidationException | ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }
}
