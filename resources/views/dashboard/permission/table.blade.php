@if(isset($rows) && count($rows) > 0)
  <form method="POST" action="/permission">
    {{ csrf_field() }}
    <table class="table table-hover table-responsive-md table-light">
      <thead class="text-center">
        <tr>
          <th scope="col">Action</th>
          <th scope="col">View</th>
          <th scope="col">Create</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rows as $index=>$items )
          <thead class="thead-light">
            <tr>
              <th scope="col" colspan="5" class="text-align">{{ title_case($index) }} Permissions 
               </th>
            </tr>
          </thead>
          @foreach($items as $index=>$row )
            <tr class="text-center">
              <th scope="row">{{ $index }}</th>
                <td >
                  @if(array_key_exists('view', $row))
                    <input name="{{$row['view']}}" data-type="view" type="checkbox" value ="{{$row['view']}}" {{($user->hasPermissionTo($row['view'])) ? "checked" : "" }}>
                  @else 
                    NA
                  @endif
                </td>
                <td class="text-center">                             
                  @if(array_key_exists('create', $row))
                    <input name="{{$row['create']}}" data-type="create" type="checkbox" value ="{{$row['create']}}" {{($user->hasPermissionTo($row['create'])) ? "checked" : "" }} >
                  @else 
                    NA
                  @endif
                </td>
                <td class="text-center">
                  @if(array_key_exists('update', $row))
                    <input name="{{$row['update']}}" data-type="update" type="checkbox" value ="{{$row['update']}}" {{($user->hasPermissionTo($row['update'])) ? "checked" : "" }}>
                  @else 
                    NA
                  @endif
                </td>
                <td class="text-center">
                  @if(array_key_exists('delete', $row))
                    <input name="{{$row['delete']}}" data-type="delete" type="checkbox" value ="{{$row['delete']}}" {{($user->hasPermissionTo($row['delete'])) ? "checked" : "" }}>
                  @else 
                    NA
                  @endif
                </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
    @include('layout.error')
    <div class="row float-right pr-3">
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    <input name="user-id" type="hidden" value ="{{$user->id}}">
  </form>
@endif