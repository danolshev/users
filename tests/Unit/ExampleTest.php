<?php

namespace Tests\Unit;

use App\Entities\UserEntity;
use App\Models\Users;
use App\Repository\UserRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @var MockObject&UserRepository  */
    private MockObject $userRepository;

    protected function setUp(): void
    {
        $this->userRepository = $this->getMockBuilder(UserRepository::class)
            ->getMock();

        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_update()
    {
        $entity = new UserEntity('name', 'email', 'notes', 1);

        $this->userRepository->update($entity);
    }
}
