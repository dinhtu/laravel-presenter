<?php

namespace App\Repositories\User;

use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserInterface
{
    public function get(Request $request): LengthAwarePaginator;

    public function getById(int $id): User|null;

    public function store(UserRequest $request):bool;

    public function update(UserRequest $request, int $id): bool;

    public function destroy(int $id): bool;

    public function saveLoginHistory();

    public function forgotPassword($request);

    public function getUserByEmail($request);

    public function getUserByToken($token);

    public function updatePasswordByToken($request, $token);

    public function checkEmail(Request $request): bool;
}
