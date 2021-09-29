<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\PersonalValue;


class PersonalValues extends Component
{   
    use WithPagination;

    public $name;
    public $personalValueId;
    public $sort;
    public $isOpen = 0;

    public function render()
    {
        return view('livewire.personal-values', [
            'personaleValues' => PersonalValue::paginate(10)
        ]);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();        
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->sort = '';
        $this->personalValueId = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);


        if (empty($this->sort)) {
            $this->sort = 0;
        }

        $data = array(
            'name' => $this->name,
            'sort' => $this->sort,
        );

        $personalValue = PersonalValue::updateOrCreate(['id' => $this->personalValueId],$data);
        session()->flash('message', $this->personalValueId ? 'Personal Value updated successfully.' : 'Personal Value created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $product = PersonalValue::findOrFail($id);
        $this->personalValueId = $id;
        $this->name = $product->name;
        $this->sort = $product->sort;
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $this->personalValueId = $id;
        PersonalValue::find($id)->delete();
        session()->flash('message', 'Personal Value deleted successfully.');
    }        

}