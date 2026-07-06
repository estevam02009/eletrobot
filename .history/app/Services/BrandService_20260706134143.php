<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BrandService
{
    public function __construct(
        private readonly BrandRepository $repository
    ) {}

    public function paginate(?string $search = null): LengthAwarePaginator
    {
        return $this->repository->paginate($search);
    }

    public function store(array $data): Brand
    {
        return $this->repository->create($data);
    }

    public function update(Brand $brand, array $data): Brand
    {
        return $this->repository->update($brand, $data);
    }

    public function destroy(Brand $brand): bool
    {
        return $this->repository->delete($brand);
    }
}
