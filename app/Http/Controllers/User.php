<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mockery\CountValidator\Exception;
use Illuminate\Validation\ValidationException;

class User extends Controller
{
    use AuthenticatesUsers;

    /**
     * login request
     * @param Request $request
     * @return array | automatically encode to json
     */
    public function login(Request $request)
    {
        $responseArray = [];
        try {

            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ], [
                'email' => 'field email is required',
                'password' => 'field password is required'
            ]);

            $credentials = $this->credentials($request);

            if ($this->guard()->attempt($credentials)) {
                $responseArray = [
                    'code' => 200,
                    'message' => 'Your login',
                    'apiKey' => session()->getId()
                ];
            } else {
                throw new Exception('This user or password is not exists');
            }
        } catch (ValidationException $error) {
            $responseArray = [
                'code' => 500,
                'errors' => $error->validator->getMessageBag()->toArray()
            ];

        } catch (\Exception $error) {
            $responseArray = [
                'code' => 500,
                'errors' => [
                    'auth' => $error->getMessage()
                ]
            ];

        } finally {

            return $responseArray;
        }
    }

    /**
     * logout request
     */
    public function logout()
    {
        // todo logout request realisation
    }

    /**
     * registration user by api
     * @param Request $request
     * @return array | automatically encode to json
     */
    public function registration(Request $request)
    {
        $responseArray = [];

        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required | email | unique:users',
                'password' => 'required'
            ], [
                'name' => 'name is required',
                'email' => 'this email is already exist',
                'password' => 'password is required'
            ]);

            UserModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $responseArray = [
                'code' => 200,
                'message' => 'User created success full. You can login by method "login" method'
            ];

        } catch (ValidationException $error) {
            $responseArray = [
                'code' => 500,
                'errors' => $error->validator->getMessageBag()->toArray()
            ];

        } finally {
            return $responseArray;

        }
    }

}
