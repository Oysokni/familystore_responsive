<?php

namespace App\Http\Controllers\Kengine;

use App\Contracts\Kengine;
use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KengineController extends Controller
{

    /**
     * KengineController construct
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Information login K-engine
     *
     * @return \Illuminate\Http\JsonResponse;
     */
    public function linkInfor()
    {
        $user = Auth::user();
        $userType = substr($user->knr_user_id, 0, 1);

        if (request()->ajax()) {
            $response = [];

            if ($userType == User::CH_LIME) {
                $response = [
                    'token1' => Kengine::MEMBER_EMP_USER,
                    'token2' => Kengine::MEMBER_EMP_PASS,
                ];
            } elseif ($userType == User::CH_FAMILY) {
                $response = [
                    'token1' => Kengine::MEMBER_FAMILY_USER,
                    'token2' => Kengine::MEMBER_FAMILY_PASS,
                ];
            } else {
                // Error:
                return response()->json([
                        'success' => 0,
                ]);
            }

            // Success
            return response()->json([
                    'success'  => 1,
                    'response' => $response,
                    'url'      => Kengine::URL_LOGIN_K_ENGINE,
            ]);
        }

        return response()->json([
                'success' => 0,
        ]);
    }

}
