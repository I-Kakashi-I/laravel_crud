<div class="p-5 dark:bg-gray-700">
    <form wire:submit.prevent="create">
        <x-input_fild wire:model="role_name" id="role_name" name="role_name"
                      placeholder="Role Name" type="text" label="Role Name"/>
        <x-jet-button :errors="$errors" type="submit">Add</x-jet-button>
    </form>

</div>
