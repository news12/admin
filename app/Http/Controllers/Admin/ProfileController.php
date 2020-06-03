<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $loggedId = intval( Auth::id() );

        $user = User::find($loggedId);

        if ($user) {
            return view('admin.profile.index', [
                'user' => $user
            ]);
        }

        return redirect()->route('admin');
    }

    public function save(Request $request)
    {
        $loggedId = intval( Auth::id() );

        $user = User::find($loggedId);

        if ($user) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);
            $validator = Validator::make([
                'name' => $data['name'],
                'email' => $data['email'],
            ], [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:100']
            ]);

            //Alteração do Nome
            $user->name = $data['name'];

            //Alteração do Email
            if ($user->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();
                if (count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email',
                    ]));
                    return redirect()->route('users.edit', [
                        'user' => $loggedId
                    ])->withErrors($validator);
                }
            }

            //Alteração da Senha
            if (!empty($data['password'])) {
                if (strlen($data['password']) >= 4) {
                    if ($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    }
                } else {
                    $validator->errors()->add('password', __('validation.confirmed', [
                        'attribute' => 'password'
                    ]));
                    return redirect()->route('users.edit', [
                        'user' => $loggedId
                    ])->withErrors($validator);
                }
            }

            if (count($validator->errors()) > 0) {
                return redirect()->route('profile', [
                    'user' => $loggedId
                ])->withErrors($validator);
            }

            $user->save();
        }

        return redirect()->route('profile');
    }

}
