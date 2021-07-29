<!DOCTYPE html>

<html>

 <head>

  <title> Choice Members </title>

  <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}" />
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>

 <body class="bg-info">

  <br /><br />

  <div class="container" style="width:600px;">
   <form name="form1" method="POST" id="framework_form"  action="{{route('group.registered')}}">
    @csrf
    <div class="form-group">

     <label>Select members</label>

     <select id="framework" name="name[]" multiple class="form-control" >
        @foreach ($users as $user)
      <option value="{{$user->nom}}"> {{$user->nom}} </option>
        @endforeach
     </select>
    </div>
    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>
   <br />
  </div>
 </body>

<script>
  $(document).ready(function() {
            $('#framework').multiselect({
                onChange: function(option, checked) {
                    // Get selected options.
                    var selectedOptions = $('#framework option:selected');
                    var participants = {!! json_encode($groupNbreParts) !!};

                    if (selectedOptions.length >= participants) {
                        // Disable all other checkboxes.
                        var nonSelectedOptions = $('#framework option').filter(function() {
                            return !$(this).is(':selected');
                        });

                        nonSelectedOptions.each(function() {
                            var input = $('input[value="' + $(this).val() + '"]');
                            input.prop('disabled', true);
                            input.parent('li').addClass('disabled');
                        });
                    }
                    else {
                        // Enable all checkboxes.
                        $('#framework option').each(function() {
                            var input = $('input[value="' + $(this).val() + '"]');
                            input.prop('disabled', false);
                            input.parent('li').addClass('disabled');
                        });
                    }
                } ,
     });
        });
</script>

</html>
