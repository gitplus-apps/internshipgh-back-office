<div class="vertical-menu">
@php
    if (Auth::user()->usertype ==='intern') {
        # code...
        $parent = DB::table("tblmodule")
        ->select('tblmodule.hasChild','tblmodule.isChild', 'tblmodule.modName', 'tblmodule.modLabel',
        'tblmodule.modURL', 'tblmodule.modIcon', 'tblmodule.modID')
        ->where('tblmodule.modStatus','1')
        ->where('tblmodule.internMod','1')
        ->orderBy('tblmodule.arrange', 'ASC')
        ->orderBy('tblmodule.id', 'ASC')
        ->get();
        $parentMods = ['parent'=>$parent];
    }
    
    if (Auth::user()->usertype ==='admin') {
        # code...
        $parent = DB::table("tblmodule")
        ->select('tblmodule.hasChild','tblmodule.isChild', 'tblmodule.modName', 'tblmodule.modLabel',
        'tblmodule.modURL', 'tblmodule.modIcon', 'tblmodule.modID')
        ->where('tblmodule.modStatus','1')
        ->where('tblmodule.adminMod','1')
        ->orderBy('tblmodule.arrange', 'ASC')
        ->orderBy('tblmodule.id', 'ASC')
        ->get();
        $parentMods = ['parent'=>$parent];
    }
    
    
@endphp
        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Main</li>
                        
                
                   @foreach ($parent as $childMod)
                    <li>
                        <a href="{{config('app.url') }}{{$childMod->modURL}}" class="waves-effect">
                             <i class="dripicons-device-desktop {{$childMod->modLabel}}"></i>
                            <span>{{$childMod->modLabel}}</span>
                        </a>
                    </li>
                   @endforeach

                   



                 
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>