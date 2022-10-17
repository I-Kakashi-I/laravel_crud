<div class="container mx-auto py-12">
    <div class="p-5 flex justify-end">
        <x-jet-button wire:click="$emit('openModal', 'roles.create')" class="bg-gray-900">Add Role</x-jet-button>
    </div>
    <div ></div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg py-12">
        <livewire:roles.table/>
    </div>
</div>
