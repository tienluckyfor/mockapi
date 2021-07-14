<?php


namespace App\GraphQL\Mutations;


use App\Models\User;
use Carbon\Carbon;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserMutations
{
    public function __construct()
    {
    }

    public function editUser($_, array $args): bool
    {
        $payload = array_intersect_key($args, array_flip(['name', 'email', 'media_ids']));
        if (!empty($args['password'])) {
            $payload['password'] = Hash::make($args['password']);
        }
        $isUpdate = User::where('id', Auth::id())
            ->update($payload);
        return $isUpdate;
    }

    public function resetUserPassword($_, array $args)
    {
        $user = User::where('email', $args['email'])->first();
        if (!$user) {
            throw new Error('User not exists!');
        }
        $passwordBroker = app(\Illuminate\Auth\Passwords\PasswordBroker::class);
        $code = Carbon::parse($user->updated_at)->format('His');
        if (
            !empty($args['token']) && $passwordBroker->tokenExists($user, $args['token']) ||
            !empty($args['code']) && $args['code'] == $code
        ) {
            $password = Hash::make($args['password']);
            $isUpdate = (bool)User::where('email', $args['email'])
                ->update(['password' => $password]);
            return [
                'status' => $isUpdate ? 'PASSWORD_CHANGED' : 'PASSWORD_UPDATE_ERROR',
                'message' => $isUpdate ? 'Your Password has been changed!' : 'Cannot change the password!',
            ];
        }
        return [
            'status' => 'CODE_INVALID',
            'message' => 'Code is not valid!'
        ];
    }


}
