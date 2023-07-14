<!-- resources/views/categories/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
</head>
<body>
<h1>Categories</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Parent Category</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Add New Category</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td><a href="/category/parent/{{$category->parent_id}}">Parent</a></td>
            <td>{{ $category->status ? 'Visible' : 'Hidden' }}</td>
            <td>{{ $category->created_at }}</td>
            <td><a href="/category/get/{{$category->id}}">Edit</a></td>
            <td><a href="/category/delete/{{$category->id}}">Delete</a></td>
            <td><a href="/category/get/0">Create</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
