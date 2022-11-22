<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entities\UserEntity;
use App\Models\Users;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository
{
    public function find(): Collection
    {
        return Users::all();
    }

    public function create(UserEntity $userEntity): void
    {
        $user = Users::create($userEntity->getData());
        $userEntity->setId((int) $user->id);

        $this->persist($userEntity);
    }

    public function update(UserEntity $userEntity): void
    {
        /** @var Users $user */
        $user = Users::findOrFail($userEntity->getId());

        $user->update($userEntity->getData());

        $this->persist($userEntity);
    }
}
