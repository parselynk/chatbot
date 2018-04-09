<div class="card">
  <div class="card-header bg-light">
      Update user's role
  </div>
  <div class="card-body">
    <form class="form-inline" method="POST" action="/user/role">
        {{ csrf_field() }}
      <div class="form-group">
        <label class="form-control-label  mb-3 mr-sm-3">Roles</label>
        <select id="role-select" class="form-control mb-3 mr-sm-3" name="role">
          <option value>Select User's role</option>
          <option value="super admin" {{($model->hasRole('super admin')) ? "selected" : ""}} >Super admin</option>
          <option value="admin"  {{($model->hasRole('admin')) ? "selected" : "" }} >Admin</option>
          <option value="miscellaneous" {{($model->hasRole('miscellaneous'))?"selected":""}}>Miscellaneous</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary mb-3 col-1">Update</button>
      <input type="hidden" name="user-id" value="{{$model->id}}">
    </form>
  </div>
    @include('layout.error')
</div>