@role('Super Admin')
@include('userType.admin.adminDashboard')
@endrole

@role('User')
   @include('userType.user.userDashboard')
@endrole
