@can('view employees')
<div class="container mx-auto py-12">
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg py-12">

        <livewire:employee.table/>

    </div>

</div>
@push('js')
    <script>
        function alert() {
            confirm("Do you want to delete this index?")
        }
    </script>
@endpush
@endcan
