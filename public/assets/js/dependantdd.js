  $('#schema_id').change(function() {
      var idSkema = $(this).val();
      if (idSkema) {
          $.ajax({
              type: "GET",
              url: "/getKode?schema_id=" + idSkema,
              success: function(res) {
                  if (res) {
                      $('#code_id').find('option').not(':first').remove();
                      $.each(res, function(key, value) {
                          $("#code_id").append('<option value="' + key + '">' + value + '</option>');
                      });
                  } else {
                      $('#code_id').find('option').not(':first').remove();
                  }
              }
          });
      } else {
          $('#code_id').find('option').not(':first').remove();
      }
  });