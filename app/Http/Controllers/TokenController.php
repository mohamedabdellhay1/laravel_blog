<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Token;

class TokenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tokens = $user->tokens;
        if ($user->role == 'super_admin') {
            // return $tokens;
            return view('token.token', compact('tokens'));
        }
        return abort(401);
    }


    // delete token
    public function delete(Request $request)
    {
        if (Auth::user()->role == 'super_admin') {
            $token = Token::where('token', $request->token);
            if ($token) {
                $token->delete();
                return redirect()->route('tokens');
            } else {
                return abort(404, 'Token not found');
            }
        }
        return abort(401, 'permission denied');

    }



    public function create(Request $request)
    {
        if (Auth::user()->role == 'super_admin') {
            $user = Auth::user();
            if ($request->type == 'view') {
                $tokenForView = $user->createToken('token-for-view', ['view']);
                return redirect()->route('tokens')->with([
                    'status' => 'API token successfully created!',
                    'bootstrap-class' => 'alert-success',
                    'token' => $tokenForView->plainTextToken,
                ]);
            } elseif ($request->type == 'create') {
                $tokenForCreate = $user->createToken('Token-for-create', ['create']);
                return redirect()->route('tokens')->with([
                    'status' => 'API token successfully created!',
                    'bootstrap-class' => 'alert-success',
                    'token' => $tokenForCreate->plainTextToken,
                ]);
            } elseif ($request->type == 'update') {
                $tokenForUpdate = $user->createToken('Token-for-update', ['update']);
                return redirect()->route('tokens')->with([
                    'status' => 'API token successfully created!',
                    'bootstrap-class' => 'alert-success',
                    'token' => $tokenForUpdate->plainTextToken,
                ]);
            } elseif ($request->type == 'delete') {
                $tokenForDelete = $user->createToken('Token-for-delete', ['delete']);
                return redirect()->route('tokens')->with([
                    'status' => 'API token successfully created!',
                    'bootstrap-class' => 'alert-success',
                    'token' => $tokenForDelete->plainTextToken,
                ]);
            } elseif ($request->type == 'edit') {
                $tokenForEdit = $user->createToken('Token-for-edit', ['edit']);
                return redirect()->route('tokens')->with([
                    'status' => 'API token successfully created!',
                    'bootstrap-class' => 'alert-success',
                    'token' => $tokenForEdit->plainTextToken,
                ]);
            } else {
                return redirect()->route('tokens')->with([
                    'status' => 'failed',
                    'message' => 'API Token Failed',
                    'bootstrap-class' => 'alert-success',
                    'token' => "Token must take a role"
                ]);
            }



        }
    }
}