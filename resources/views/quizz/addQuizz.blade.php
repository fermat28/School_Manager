@extends('layouts.theme')
@section('body')
<div class="container">
<!-- ******************** preview image *********************** -->
<div class="row">
<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
<div id="preview" class="">
<!-- ******************** Error report *********************** -->
</div>
@if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ $error }}
            </li>

            @endforeach
        </ul>
    @endif
<br>
</div>
</div>
<!-- ******************** End Error report *********************** -->
<div class="row">
<div class="col-lg-12 col-md-12">
<!-- ******************** Adding product Form *********************** -->
 <form class="form-horizontal " method="POST" action="/addquizdata" enctype="multipart/form-data">

      {{ csrf_field() }}
      <input type="hidden" name="action" value="addquiz">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

<!--Name ******************************************* -->
   <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Name</label>
      <div class="col-lg-6 col-md-6">
        <input class="form-control" type="text" id="name" name="name" class="form-control" >
        </div>
   </div>
<!--Score ******************************************* -->
   <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Score</label>
      <div class="col-lg-6 col-md-6">
        <input class="form-control" type="text" id="score" name="score" class="form-control" >
        </div>
   </div>

<!--instructions ******************************************* -->
   <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Instructions</label>
      <div class="col-lg-6 col-md-6">
        <textarea class="form-control" type="text" id="instructions" name="instructions" class="form-control" ></textarea>
        </div>
   </div>
<!--Category ******************************************* -->
      <div class="form-group">
        <label  for="Label" class="col-lg-3 col-md-3 control-label">Category </label>
        <div class="col-lg-6 col-md-6">
        <select class="form-control" id="tag" name="tag">
          @foreach($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endforeach
        </select>
        <br>
        </div>

         </div>


 <!--submit ******************************************* -->
       <div class="form-group">
       <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
        <button type="submit"  value="Submit" class="btn btn-warning">Next</button>
      </div>
       </div>

  </form>
<!-- ****************** END adding product form ****************** --> </div>
</div>
</div>
<script>





</script>
@endsection
