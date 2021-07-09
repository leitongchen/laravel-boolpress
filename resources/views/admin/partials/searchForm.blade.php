<div class="card bg-light mb-3">
    <div class="card-header">Looking for something?</div>
    
    <div class="p-5">
        <form class="form-row d-flex align-items-end" action="{{ route('admin.posts.filter') }}" method="get">
            @csrf

            <div class="input-group-lg input_group col">
                <label for="title">Search in title</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <div class="input-group-lg input_group col">
                <label for="content">Keyword</label>
                <input class="form-control" name="content" id="content" rows="10" cols="50"> 
            </div>


            <div class="input-group-lg input_group col">
                <label for="category">Choose a category</label>
                <select class="form-control" name="category" id="category">
                    <option value="">-- Choose a category --</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Search">
            </div>


        </form>
    </div>

</div>