 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="{{ url('admin') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
                 {{ 'sa' . session('user')->role_id }}
             </a>
         </li><!-- End Dashboard Nav -->
         <?php $sections = DB::table('assign_sections')
             ->join('sections', 'sections.id', '=', 'assign_sections.section_id')
             ->where('assign_sections.role_id', '=', session('user')->role_id)
             ->get();
         ?>
         @foreach ($sections as $section)
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#{{ str_replace(' ', '', $section->section) }}-nav"
                     data-bs-toggle="collapse" href="{{ $section->url }}">
                     <i class="bi bi-journal-text"></i><span>{{ $section->section . ' - ' . $section->id }}</span><i
                         class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="{{ str_replace(' ', '', $section->section) }}-nav" class="nav-content collapse "
                     data-bs-parent="#sidebar-nav">
                     <?php $subsections = DB::table('assign_sub_sections')
                         ->join('sub_sections', 'sub_sections.id', '=', 'assign_sub_sections.subsection_id')
                         ->where('sub_sections.section_id', '=', $section->id)
                         ->where('assign_sub_sections.role_id', '=', session('user')->role_id)
                         ->get(); ?>
                     @foreach ($subsections as $subsection)
                         <li class="nav-item">
                             <a class="nav-link collapsed" href="{{ url($subsection->url) }}">
                                 <i class="bi bi-journal-text"></i><span>{{ $subsection->subsection }}</span></i>
                             </a>
                         </li>
                     @endforeach

                 </ul>
             </li>
         @endforeach

         {{-- <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#baseinfo-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Base Info</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="baseinfo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('company') }}">
                         <i class="bi bi-journal-text"></i><span>Company Info</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('supplier') }}">
                         <i class="bi bi-journal-text"></i><span>Supplier</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('customer') }}">
                         <i class="bi bi-journal-text"></i><span>Customer</span></i>
                     </a>
                 </li>

             </ul>
         </li>

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#warehouse-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Warehouse</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="warehouse-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('warehouse') }}">
                         <i class="bi bi-journal-text"></i><span>Warehouse</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('binset') }}">
                         <i class="bi bi-journal-text"></i><span>Bin Set</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('binsize') }}">
                         <i class="bi bi-journal-text"></i><span>Bin Size</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('binproperty') }}">
                         <i class="bi bi-journal-text"></i><span>Bin Property</span></i>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#staff-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Staff</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="staff-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('staff') }}">
                         <i class="bi bi-journal-text"></i><span>Staff</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('checkcode') }}">
                         <i class="bi bi-journal-text"></i><span>Check Code</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('stafftype') }}">
                         <i class="bi bi-journal-text"></i><span>Staff Type</span></i>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#driver-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Driver</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="driver-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('driver') }}">
                         <i class="bi bi-journal-text"></i><span>Driver</span></i>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('dispatch') }}">
                         <i class="bi bi-journal-text"></i><span>Dispatch List</span></i>
                     </a>
                 </li>
             </ul>
         </li>--}}

         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#manage-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="manage-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('user') }}">
                        <i class="bi bi-journal-text"></i><span>user</span></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('role') }}">
                        <i class="bi bi-journal-text"></i><span>Roles</span></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('section') }}">
                        <i class="bi bi-journal-text"></i><span>Section</span></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('assignsection/create') }}">
                        <i class="bi bi-journal-text"></i><span>Assign Section</span></i>
                    </a>
                </li>
            </ul>
        </li> 


     </ul>

 </aside><!-- End Sidebar-->
