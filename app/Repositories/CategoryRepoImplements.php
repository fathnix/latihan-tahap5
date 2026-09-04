<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepository;
use Override;

class CategoryRepoImplements implements CategoryRepository{
    #[Override]
    public function getAll()
    {
        return Category::all();
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