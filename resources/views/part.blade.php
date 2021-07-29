

    <script type="text/javascript">
        $(document).ready(function() {
            $('#framework').multiselect({
                onChange: function(option, checked) {
                    // Get selected options.
                    var selectedOptions = $('#framework option:selected');

                    if (selectedOptions.length >= 4) {
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
                }
            });
        });


        nonSelectedText: 'Select Members',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px',
  includeSelectAllOption: true,
    </script>

