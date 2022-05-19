jQuery(document).ready(function() {
  $(".summernote-dis").summernote({
      height:400,
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
          ['view', ['fullscreen', 'codeview', 'help']]
      ],
      followingToolbar: false,
  }), $('.note-editable').attr('contenteditable',false);
});