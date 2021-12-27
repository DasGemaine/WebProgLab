@extends("layout.layout")
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h1 class="h3 mb-3 fw-normal text-center">Update Furniture</h1>

                <div class="card-body">
                    <form action="/updateFurniture/{{ $items->name }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Furniture Name</label>
                            <input type="text" class="form-control" name="name" id="name" autofocus required value="{{ old ('name', $items->name)}}">
                            @error('name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Furniture Price</label>
                            <input type="number" class="form-control" name="price" id="price" autofocus required value="{{ old ('price', $items->price)}}">
                            @error('price')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="color">Furniture Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" id="color" autofocus required value="{{ old ('color') }}">
                            @error('color')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="furniture_type">Furniture Type</label>
                            <select class="form-control @error('furniture_type') is-invalid @enderror" id="furniture_type" name="furniture_type">
                                @foreach ($types as $type)
                                    <option>{{$type->type}}</option>
                                    {{-- <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option> --}}
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="image">Choose File</label>
                            <input type="file" class="form-control" name="image" id="image"/>
                            @error('image')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 



@endsection