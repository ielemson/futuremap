{{-- @role('Super Admin' || '')
@include('userType.admin.adminDashboard')
@endrole

@role('User')
   @include('userType.user.userDashboard')
@endrole --}}


{{-- @hasanyrole('Super Admin|News Manager')
 @include('userType.admin.adminDashboard')
@else
   @include('userType.user.userDashboard')
@endhasanyrole --}}

@hasanyrole('Super Admin|News Manager')
    @include('userType.admin.adminDashboard')
@elseif(auth()->user()->hasRole('Vendor'))
    @include('userType.vendor.vendorDashboard')
@else
    @include('userType.user.userDashboard')
@endhasanyrole