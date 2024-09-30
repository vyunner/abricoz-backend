<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Support\Facades\Log;

/**
 * @group Auth
 */
class AuthLoginController extends Controller
{
    /**
     * Авторизация
     * @param AuthLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthLoginRequest $request)
    {
        // Начинаем буферизацию вывода
        ob_start();

        $data = $request->validated();

        $user = User::where(['phone' => $data['phone']])->first();
        $user['roles'] = $user->getRoleNames();
        $token = $user->createToken('auth_token')->plainTextToken;

        // Получаем содержимое буфера вывода
        $output = ob_get_clean();
        if (!empty($output)) {
            // Логируем неожиданный вывод
            Log::warning('Неожиданный вывод обнаружен:', ['output' => $output]);

            // Вы можете использовать dd для немедленного вывода и остановки выполнения
            dd('Неожиданный вывод обнаружен:', $output);
        }

        return $this->response(['user' => $user, 'token' => $token], 'Вы успешно вошли в аккаунт!');
    }
}
