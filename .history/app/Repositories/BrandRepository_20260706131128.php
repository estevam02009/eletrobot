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
}
