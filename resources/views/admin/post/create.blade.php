@extends('layouts.master')
@section('title','Add post')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-heard">
                <h4>Add Posts
                    <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="" selected disabled>-- select category-- </option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <strong>tags:</strong>--}}
{{--                        <input type="text" class="form-control" id="tags_name" readonly>--}}
{{--                        <input type="text" hidden class="form-control" id="select_tags_ids" name="tags_ids" readonly>--}}
{{--                        <input type="text" hidden id="tag_ids">--}}
                        <label>Tags:</label>
                        <select class="js-example-basic-multiple" id="month" name="month" multiple style="width: 250px">>
                            <option value=""></option>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </form>
                    <input type="hidden" value="tag_ids" name="description" class="form-control"></textarea>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="img" class="form-control"/>
                    </div>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Hidden</label>
                                <input type="checkbox" name="status"/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="md-3">
                                <button type="submit" class="btn btn-primary float-end">Save Post</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
    @push('scripts')
        <script>
            $(document).ready(function (){
                $('#tag').select2();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#month').select2();
            });
        </script>
    @endpush

@endsection
