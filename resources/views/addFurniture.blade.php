@extends("layout.layout")
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                        Add New Furniture
                </div>
                <div class="card-body">
                    <form action="/addFurniture" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Furniture Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autofocus required value="{{ old ('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Furniture Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" autofocus required value="{{ old ('price') }}">
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
                                <option selected>Choose...</option>
                                @foreach ($types as $type)
                                    <option>{{$type->type}}</option>
                                @endforeach
                            </select>
                            @error('furniture_type')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Choose File</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"/>
                            @error('image')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 



@endsection