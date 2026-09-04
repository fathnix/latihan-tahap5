<?php
namespace App\Services;

use App\Repositories\Interface\ProductRepository;

class ProductService{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function createProduct(array $data){
        
        $product = $this->productRepo->create($data);
        return $product;
    }

    public function getProduct(string $id){
        return $this->productRepo->getById($id);
    }

    public function updateProduct(string $id, array $data){
        return $this->productRepo->update($id, $data);
    }

    public function deleteProduct(string $id){
        return $this->productRepo->delete($id);
    }

      
    
}