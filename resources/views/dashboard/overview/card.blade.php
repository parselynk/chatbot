<div class="row">
    <div class=" col-md-12">
        <h4>{{ $title }}</h4>
        <hr/>
    </div>
    @if($items && count($items) > 0)
        @foreach($items as $item)
        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{ $item['name'] }}</span>
                        <span class="font-weight-light">{{ $item['count'] }}</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-people"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                     No data is available since 7 days ago
                </div>
            </div>
        </div>
    @endif
</div>
