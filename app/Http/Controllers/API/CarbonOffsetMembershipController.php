<?php

namespace App\Http\Controllers\API;


use App\Domains\SubscriptionMembership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\CarbonOffsetService;
use Exception;


class CarbonOffsetMembershipController extends Controller
{
    public function index(Request $request)
    {
        $today = date('Y-m-d');
        $validator = Validator::make($request->all(), [
            'subscriptionStartDate' => 'required|date_format:Y-m-d|before_or_equal:'.$today,
            'scheduleInMonths' => 'required|integer|between:0,36',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        try {
            return response()->json((new CarbonOffsetService())->getSchedule(new SubscriptionMembership($validator->validated()['subscriptionStartDate'], (int) $validator->validated()['scheduleInMonths'])), 200);
        } catch (Exception $ex) {
            return response()->json($ex->getCode() ."-". $ex->getMessage(),400);
        }
    }
}
