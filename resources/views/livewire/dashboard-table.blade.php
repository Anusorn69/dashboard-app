<div>
  <x-button type="button" wire:click="new">New</x-button>
  <div>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Dashboard Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rows as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->dashboard_name }}</td>
          <td>
            <x-button type="button" wire:click="edit('{{ $row->id }}')">
              <x-icon.pencil-square />
              แก้ไข
            </x-button>
            <x-danger-button type="button" wire:click="deleteConfirm('{{ $row->id }}')">
              <x-icon.trash />
              ลบ
            </x-danger-button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <x-dialog-modal wire:model="showEditModal">
    <x-slot name="title">
        Edit Id =  {{ $editing_id }}
    </x-slot>

    <x-slot name="content">
      <div>
        <x-label for="dash_name" value="{{ __('Dashboard Name') }}" />
        <x-input id="dash_name" wire:model.defer="dashboard_name" class="block mt-1 w-full" type="text" name="dash_name" :value="old('dash_name')" required autofocus />
      </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button 
          wire:click="$set('showEditModal', false)" 
          wire:loading.attr="disabled"
        >
          ปิด
        </x-secondary-button>
        <x-button
          wire:click="save"
        >
          บันทึก
        </x-button>
    </x-slot>
  </x-dialog-modal>

  <x-dialog-modal wire:model="showDeleteModal" maxWidth="sm">
    <x-slot name="title">
        Delete confirm
    </x-slot>

    <x-slot name="content">
      <h3 class="text-xl text-red-600">ต้องการลบใช่หรือไม่ ?</h3>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button class="mr-4" 
          wire:click="$set('showDeleteModal', false)" 
          wire:loading.attr="disabled"
        >
          ยกเลิก
        </x-secondary-button>
        <x-button type="button"
          wire:click="delete"
        >
          ใช่
        </x-button>
    </x-slot>
  </x-dialog-modal>


</div>