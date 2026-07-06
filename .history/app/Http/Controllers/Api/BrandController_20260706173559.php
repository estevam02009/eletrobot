<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends BaseController
{

    public function __construct(
        private readonly BrandService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return BrandResource::collection(
            $this->service->paginate($request->search)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = $this->service->store($request->validated());

        return $this->success(
            new BrandResource($brand),
            'Marca cadastrada com sucesso.',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand = $this->service->update($brand, $request->validated());

        return response()->json([
            'message' => 'Marca atualizada com sucesso.',
            'data' => new BrandResource($brand),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->service->destroy($brand);

        return response()->json([
            'message' => 'Marca removida com sucesso.',
        ]);
    }
}
