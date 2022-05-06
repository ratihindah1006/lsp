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

$('#schema_id').change(function() {
    var idSkema = $(this).val();
    if (idSkema) {
        $.ajax({
            type: "GET",
            url: "/getKodeLisan?schema_id=" + idSkema,
            success: function(res) {
                if (res) {
                    $('#code_lisan_id').find('option').not(':first').remove();
                    $.each(res, function(key, value) {
                        $("#code_lisan_id").append('<option value="' + key + '">' + value + '</option>');
                    });
                } else {
                    $('#code_lisan_id').find('option').not(':first').remove();
                }
            }
        });
    } else {
        $('#code_lisan_id').find('option').not(':first').remove();
    }
});


$('#schema_id').change(function() {
    var idSkema = $(this).val();
    if (idSkema) {
        $.ajax({
            type: "GET",
            url: "/getKodePraktik?schema_id=" + idSkema,
            success: function(res) {
                if (res) {
                    $('#code_praktik_id').find('option').not(':first').remove();
                    $.each(res, function(key, value) {
                        $("#code_praktik_id").append('<option value="' + key + '">' + value + '</option>');
                    });
                } else {
                    $('#code_praktik_id').find('option').not(':first').remove();
                }
            }
        });
    } else {
        $('#code_praktik_id').find('option').not(':first').remove();
    }
});