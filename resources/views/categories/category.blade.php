<!-- resources/views/categories/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
</head>
<body>
<h1>Categories</h1>
<form method="get">
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Parent Category</th>
        <th>Status</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="name" value="{{$item->name}}"></td>
            <td><input type="text" name="description" value="{{$item->description}}"></td>
            <td><select name="parent_id">
                    @foreach($categories as $category)
                        @if($category->id != $item->id && $category->id == $item->parent_id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @elseif($category->id != $item->id)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select></td>
            <td><select name="status">
                    <option value="0">Hidden</option>
                    <option value="1" @selected($item->status)>Visible</option>
                </select></td>
            <td><input type="text" readonly value="{{$item->created_at}}"></td>
            <td><input type="hidden" hidden="hidden" value="{{$item->id}}"></td>
            <td><input type="submit" formaction="/category/get/{{$item->id ?  : 0}}/updateOrCreate" value="Save"></td>
            <td><input type="submit" value="Cancel"></td>
        </tr>
    </tbody>
</table>
</form>
</body>
</html>
