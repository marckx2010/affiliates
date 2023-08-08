<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AffiliateController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|Response|HttpResponse|\Inertia\Response
     */
    public function index(Request $request): JsonResponse|Response|HttpResponse|\Inertia\Response
    {
        $affiliate = new Affiliate();
        $affiliates = $affiliate->readFile();


        // if error send some contextual info to the error handler
        if (!$affiliates) {
            return Inertia::render('Errors/ErrorHandler', [
                'affiliates' => $affiliate->errorContext->affiliatesContents,
                'row' => $affiliate->errorContext->row
            ])->toResponse($request)->setStatusCode(HttpResponse::HTTP_BAD_REQUEST);
        }

        $sortedAffiliates = [];
        foreach($affiliates as $aff) {
            $sortedAffiliates[] = $aff;
        }

        return Inertia::render('Welcome', [
            'affiliates' => $sortedAffiliates,
            'homeOfficeLatLng' => $affiliate->homeOfficeLatLng
        ]);
    }
}
