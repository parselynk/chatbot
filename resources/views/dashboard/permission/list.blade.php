@if(isset($rows) && count($rows) > 0)
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
              <th scope="row">
                <a href="/permission/delete/{{$index}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                {{ title_case($index) }}
              </th>
                <td >
                  @if(array_key_exists('view', $row))
                     <i class="fa fa-check text-success" aria-hidden="true"></i>
                  @else 
                    <i class="fa fa-times text-muted" aria-hidden="true"></i>
                  @endif
                </td>
                <td class="text-center">                             
                  @if(array_key_exists('create', $row))
                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                  @else 
                    <i class="fa fa-times text-muted" aria-hidden="true"></i>
                  @endif
                </td>
                <td class="text-center">
                  @if(array_key_exists('update', $row))
                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                  @else 
                    <i class="fa fa-times text-muted" aria-hidden="true"></i>
                  @endif
                </td>
                <td class="text-center">
                  @if(array_key_exists('delete', $row))
                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                  @else 
                    <i class="fa fa-times text-muted" aria-hidden="true"></i>
                  @endif
                </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  @include('layout.error')
@endif