<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepository;
use Illuminate\Support\Facades\Cache;
use Override;

class CategoryRepoImplements implements CategoryRepository{
    #[Override]
    public function getAll()
    {
        return Cache::remember('all_categories', 120, function(){
            return Category::all()->toArray();
        });
    }

    #[Override]
    public function getById(string $id)
    {
        return Category::findOrFail($id);
    }

    #[Override]
    public function create(array $data)
    {
        return Category::create($data);
    }

    #[Override]
    public function update(string $id, array $data)
    {
        $kat = $this->getById($id);
        $kat->update($data);
        return $kat;
    }

    #[Override]
    public function delete(string $id)
    {
        $kat = $this->getById($id);
        return $kat->delete();
    }
}