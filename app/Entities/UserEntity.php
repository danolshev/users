<?php

namespace App\Entities;

class UserEntity implements Journalable
{
    public const OWNER_TYPE_USER = 'user';

    public function __construct(
        protected string $name,
        protected string $email,
        protected string $notes,
        protected ?int $id = null,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getData(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'notes' => $this->notes,
        ];
    }

    public function getOwnerType(): string
    {
        return static::OWNER_TYPE_USER;
    }

    public function getJournalableFields(): array
    {
        return [
            'id',
            'name',
            'email',
            'notes',
        ];
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
