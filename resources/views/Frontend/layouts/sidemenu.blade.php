<section class="header">
    <div class="side-menu" id="side-menu">
        <h4 style="color:green">&nbspCategories</h4>
        <ul>
            @foreach($categories as $category)
            <li>
                <span
                    onclick="window.location.href = '{{route('category',$category->id)}}';">{{$category->name}}</span><i
                    class="fa fa-angle-right"></i>
                <ul>
                    @foreach($category->subcategories as $subcategory)
                    <li
                        onclick="event.preventDefault();window.location.href = '{{route('subcategory',$subcategory->id)}}';">
                        {{$subcategory->name}}</li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</section>