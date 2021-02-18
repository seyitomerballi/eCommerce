<div class="form-group ">
    <label>Select Category Level</label>
    <select name="category_parent_id" id="category_parent_id"
            class="form-control select2" style="width: 100%;">
        <option value="0">Main Category</option>
        @if(!empty($getCategories))
            @foreach($getCategories as $category)
                <option
                    @if(!empty($categoryData->category_id) && ($categoryData->category_id == $category->id))
                    selected
                    @endif
                    value="{{$category->id}}"

                >{{$category->category_name}}</option>
                @if(!empty($category->subcategories))
                    @foreach($category->subcategories as $subcategory)
                        <option
                            @if(!empty($categoryData->subcategory->category_id) && ($categoryData->subcategory->category_id == $subcategory->id))
                            selected
                            @endif
                            value="{{$subcategory->id}}">
                            &nbsp;&ensp;&#8627;&nbsp;{{$subcategory->category_name}}</option>
                    @endforeach
                @endif
            @endforeach
        @endif
    </select>
    @if($errors->has('category_parent_id'))
        <span id="category_parent_id_err"
              style="color: red">{{$errors->first('category_parent_id')}}</span>
    @endif
</div>
