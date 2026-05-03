<?php

declare(strict_types=1);

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository
{
    /* This repository uses constructor promotion to inject the model into the repository so that the repository can be used in the service */
    public function __construct(protected Model $model) {}

    /**
     * Creates a new record in the database
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Updates a record in the database
     */
    public function update(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            return $this->model->where('id', $data['id'])->update($data);
        });
    }

    /**
     * Deletes a record from the database
     */
    public function delete(int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }
}
