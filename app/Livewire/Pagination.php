<?php

namespace App\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $paginator;
    public $perPageOptions = [10, 25, 50, 100, 200];

    public function mount($paginator)
    {
        $this->paginator = $paginator;
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
    }

    public function previousPage()
    {
        $this->setPage($this->paginator->currentPage() - 1);
    }

    public function nextPage()
    {
        $this->setPage($this->paginator->currentPage() + 1);
    }

    public function resetPage()
    {
        $this->setPage(1);
    }

    public function setPage($page)
    {
        // Asegurarse de que la página esté dentro de los límites
        $page = max(1, min($page, $this->paginator->lastPage()));
        $this->paginator->setCurrentPage($page);
    }

    public function render()
    {
        return view('livewire.pagination');
    }
}