<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository
{
    public function paginate(?string $search = null)
    {
        return Brand::query()
            ->when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->orderBy('name')
            ->paginate(10);
    }

    public function create(array $data): Brand
    {
        return Brand::create($data);
    }

    public function update(Brand $brand, array $data): bool
    {
        $brand->update($data);

        return $brand->refresh();
    }

    public function delete(Brand $brand): bool
    {
        return $brand->delete();
    }
}
