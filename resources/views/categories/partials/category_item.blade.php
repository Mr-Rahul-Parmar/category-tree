{{--<tr>--}}
{{--    <td>{{ $category->id }}</td>--}}
{{--    <td>{{ str_repeat('-', $category->depth) }} {{ $category->name }}</td>--}}
{{--    <td>--}}
{{--        @if ($category->parent)--}}
{{--            {{ $category->parent->name }}--}}
{{--        @else--}}
{{--            None--}}
{{--        @endif--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <a href="{{ route('category.show', ['id'=>$category->id]) }}" class="btn btn-info btn-sm">View</a>--}}
{{--        <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-warning btn-sm">Edit</a>--}}
{{--        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>--}}
{{--    </td>--}}
{{--</tr>--}}

{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <form action="{{ route('category.delete') }}" method="post" id="deleteCategory" style="display: inline;">--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}
{{--                    <span>Are you want to sure delete this category</span>--}}
{{--                    <input type="hidden" name="id" value="{{$category->id}}">--}}
{{--                    --}}{{--                    <button type="submit" class="btn btn-danger btn-sm deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>--}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="sub'" class="btn btn-danger deleteBtn">Delete</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<li class="list-group-item">
    {{ $category->name }}

    @if ($category->children->count() > 0)
        <ul class="list-group">
            @foreach ($category->children as $child)
                @include('categories.partials.category_item', ['category' => $child])
            @endforeach
        </ul>
    @endif


    <a href="{{ route('category.show', ['id'=>$category->id]) }}" class="btn btn-info btn-sm mx-1">View</a>
    <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-warning btn-sm mx-1">Edit</a>

    <form action="{{ route('category.delete') }}" id="deleteCategory" method="POST" style="display: inline;">
        @csrf
        <input type="hidden" name="id" value="{{$category->id}}">
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
    </form>
</li>


