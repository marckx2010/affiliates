<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AffiliateController extends Controller
{
    private function fetchData(): JsonResponse
    {
        try {
            // Replace with your API endpoint
            $url = config('services.marckx.api_endpoint') . "/checkresourcelimit?application=affiliates";

            // Make the API call
            $response = Http::get($url);

            // Check if the response is successful
            if ($response->successful()) {
                // Decode JSON response
                $data = $response->json();

                // Return response or process it as needed
                return response()->json([
                    'status' => 'success',
                    'data' => $data,
                ]);
            } else {
                // Handle error responses
                return response()->json([
                    'status' => 'error',
                    'message' => $response->status() . ' - ' . $response->body(),
                ], $response->status());
            }
        } catch (Exception $e) {
            // Handle exceptions
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|Response|HttpResponse|\Inertia\Response
     */
    public function index(Request $request): JsonResponse|Response|HttpResponse|\Inertia\Response
    {
        // check on resource usage for this application
       $response = $this->fetchData();

        if ($response->status() !== HttpResponse::HTTP_OK) {

            $url = config('services.marckx.api_endpoint') . "/activityLog/affiliates/error";
            // Make the API call
            $response = Http::get($url);
            //dd($url);
            //file_get_contents($url);

            return Inertia::render('Errors/ErrorHandler', [
                'resources' => 'Nope',
            ])->toResponse($request)->setStatusCode(HttpResponse::HTTP_BAD_REQUEST);
        }

        $url = config('services.marckx.api_endpoint') . "/activityLog?application=affiliates&status=success";
        // Make the API call
        $response = Http::get($url);

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
