@if($status=='Active')
<span class="badge border border-success bg-success-subtle text-success">{{$status}}</span>
@else
<span class="badge border border-danger bg-danger-subtle text-danger">{{$status}}</span>
@endif