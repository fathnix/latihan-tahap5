<?php
namespace App\Services;

use App\Repositories\Interface\ProductRepository;

class ProductService{
    protected $productRepo;

    public function __construct(ProductService $productService)
    {
        $this->productRepo = $productService;
    }

    public function createProduct(array $data){
        
        $product = $this->productRepo->createProduct($data);
        return $product;
    }

    public function getProduct(string $id){
        return $this->productRepo->getProduct($id);
    }

    public function updateProduct(string $id, array $data){
        return $this->productRepo->updateProduct($id, $data);
    }

    public function deleteProduct(string $id){
        return $this->productRepo->deleteProduct($id);
    }

      
    
}