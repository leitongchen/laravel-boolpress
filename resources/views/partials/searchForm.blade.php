<div class="search_form_container">

    <div class="card mb-3">
        <h2 class="card-header text-center">Search articles</h2>
        
        <form class="form-row d-flex align-items-end" action="{{ route($route) }}" method="get">
            @csrf

            <div class="input-group-lg input_group col-12 col-sm-6 col-md-3">
                <label for="title">Search in title</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <div class="input-group-lg input_group col-12 col-sm-6 col-md-3">
                <label for="content">Keyword</label>
                <input class="form-control" name="content" id="content" rows="10" cols="50"> 
            </div>


            <div class="input-group-lg input_group col-12 col-sm-6 col-md-3">
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

            <div class="submit_btn input-group-lg input_group col-12 col-sm-6 col-md-3">
                <input class="bool_btn primary_btn btn-lg block_btn" type="submit" value="Search">
            </div>


        </form>
        

    </div>

</div>