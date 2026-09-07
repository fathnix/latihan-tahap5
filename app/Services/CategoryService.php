<?php 
namespace App\Services;
use App\Repositories\Interface\CategoryRepository;

class CategoryService{
    protected $katRepo;

    public function __construct(CategoryRepository $katRepo)
    {
        $this->katRepo = $katRepo;
    }

    public function getKat(){
        return $this->katRepo->getAll();
    }

    public function createKat(array $data){
        return $this->katRepo->create($data);   
    }

    public function updateKat(string $id, array $data){
        return $this->katRepo->update($id, $data);
    }

    public function deleteKat(string $id){
        return $this->katRepo->delete($id);
    }
    
}