<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dashboard;

class DashboardTable extends Component
{
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $dashboard_name = '';
    public $editing_id = 0;

    public function save()
    {
        if($this->editing_id == 0) {
            Dashboard::create([
                'dashboard_name' => $this->dashboard_name
            ]);
        }
        else {
            Dashboard::where('id', $this->editing_id)->update([
                'dashboard_name' => $this->dashboard_name
            ]);
        }

        $this->showEditModal = false;
    }

    public function new()
    {
        $this->editing_id = 0;

        $this->dashboard_name = '';
        $this->showEditModal = true;
    }

    public function edit($id)
    {
        $this->editing_id = $id;

        $data = Dashboard::where('id', $id)->first();

        $this->dashboard_name = $data->dashboard_name;

        $this->showEditModal = true;   
    }

    public function delete()
    {
        Dashboard::where('id', $this->editing_id)->delete(); 
        $this->showDeleteModal = false;   
    }

    public function deleteConfirm($id)
    {
        $this->editing_id = $id;
        $this->showDeleteModal = true;
    }

    public function render()
    {
        return view('livewire.dashboard-table', [
            'rows' => Dashboard::all(),
            'b' => 3
            
        ]);
    }
}
