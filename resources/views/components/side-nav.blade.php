<div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-lg has-bg-image">
        <div class="image-wrapper">
            <img
                src="https://user-images.githubusercontent.com/25878302/144499035-2911184c-76d3-4611-86e7-bc4e8ff84ff5.jpg"
                alt="sidebar background"/>
        </div>
        <div class="sidebar-layout">
            <div class="sidebar-header">
        <span style="
                text-transform: uppercase;
                font-size: 15px;
                letter-spacing: 3px;
                font-weight: bold;
              ">CRUD</span>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <x-side-nav-item :route="route('dashboard')" :icon="'ri-home-5-line'" title="Home"></x-side-nav-item>
                        <x-side-nav-sub-item  :icon="'ri-group-line'" :title="'Users'">
                            <x-side-nav-item  :route="route('users')" :icon="'ri-list-ordered'" :title="'All Users'"></x-side-nav-item>
                        </x-side-nav-sub-item>
                        <x-side-nav-sub-item  :icon="'ri-building-2-line'" :title="'Departments'">
                            <x-side-nav-item  :route="route('department.index')" :icon="'ri-list-ordered'" :title="'All Departments'"></x-side-nav-item>
                            <x-side-nav-item  :route="route('department.create')" :icon="'ri-file-add-line'" :title="'Create Department'"></x-side-nav-item>
                        </x-side-nav-sub-item>

                        <x-side-nav-sub-item  :icon="'ri-git-branch-line'" :title="'Branches'">
                            <x-side-nav-item  :route="route('branches.index')" :icon="'ri-list-ordered'" :title="'All Branches'"></x-side-nav-item>
                            <x-side-nav-item  :route="route('branches.create')" :icon="'ri-add-box-line'" :title="'Create Branch'"></x-side-nav-item>
                        </x-side-nav-sub-item>


                        <x-side-nav-sub-item  :icon="'ri-group-line'" :title="'Employee'">
                            <x-side-nav-item  :route="route('employee.index')" :icon="'ri-list-ordered'" :title="'All Employees'"></x-side-nav-item>
                            <x-side-nav-item  :route="route('employee.create')" :icon="'ri-user-add-line    '" :title="'Create Employee'"></x-side-nav-item>
                        </x-side-nav-sub-item>

                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer"><span>Sidebar footer</span></div>
        </div>
    </aside>
    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <main class="content">
            {{$slot}}
        </main>
        <div class="overlay"></div>
    </div>
</div>
