<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interface\ProductRepository;
use Override;

class ProductRepoImplements implements ProductRepository{
    #[Override]
    public function  getAll()
    {
        return Product::all();
    }

    #[Override]
    public function getById(string $id)
    {
        return Product::findOrFail($id);
    }

    #[Override]
    public function create(array $data)
    {
        return Product::create($data);
    }

    #[Override]
    public function update(string $id, array $data)
    {
        $product = $this->getById($id);
        $product->update($data);
        return $product;
    }

    #[Override]
    public function delete(string $id)
    {
        $product = $this->getById($id);
        return $product->delete();
    }

}