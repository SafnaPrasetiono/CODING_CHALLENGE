<?php

namespace App\Http\Livewire;

use App\Models\pembayaran_bonus;
use Livewire\Component;
use Livewire\WithPagination;

class TableBonus extends Component
{

    use WithPagination;

    public $pages = 0;

    protected $listeners = ['goDelete' => 'deleteBonus'];


    public function deleteConfrim($id)
    {
        $this->deleteBonus = $id;

        $this->dispatchBrowserEvent('show-delete-Confrim');
    }

    public function deleteBonus(){
        $id = $this->deleteBonus;
        $data = pembayaran_bonus::find($id);
        if($data) {
            $data->delete();
        }
        session()->flash('delete', 'Data Berhasil Dihapus.');
    }


    public function render()
    {
        if($this->pages >= 0){
            $data = pembayaran_bonus::paginate($this->pages);
        }else{
            $data = pembayaran_bonus::all();
        }
        return view('livewire.table-bonus',[
            'data' => $data
        ]);
    }
}
