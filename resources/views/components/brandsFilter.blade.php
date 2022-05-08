<div class="d-flex justify-content-center">
    <!-- Default dropend button -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Brands
        </button>
        <ul class="dropdown-menu">
        @foreach ($brands as $brand)
            <li>
                <a href="{{route('phones.index')}}?brand={{$brand->name}}
                        {{request('search')? '&search='. request('search') : '' }}
                            " class="dropdown-item">{{$brand->name}}</a>
            </li>
        @endforeach
        </ul>
    </div>
</div>