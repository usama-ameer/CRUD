@extends('layouts.bootstrap5')
@section('content')
    


<div class=" card text-white bg-secondary mb-3" style="max-width: 18rem;">
    <div class="card-header"></div>
    <div class="card-body">
      <h1 class="card-title">Welcome to About Page</h1>
    </div>
</div>

<a href="/users?age=21" class="btn btn-danger">18+</a>
<a href="/users?age=11" class="btn btn-success">under 18</a>

@endsection