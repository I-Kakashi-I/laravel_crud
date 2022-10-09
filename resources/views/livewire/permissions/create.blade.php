
<div class="p-5 dark:bg-gray-700">
    <form wire:submit.prevent="create">
        <x-input_fild wire:model="permission_name" id="permission_name" name="permission_name"
                      placeholder="Permission Name" type="text" label="Permission Name"/>
        <x-jet-button :errors="$errors" type="submit">Add</x-jet-button>
    </form>

</div>
