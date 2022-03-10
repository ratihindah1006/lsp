jQuery(document).ready(function() {
    $(".summernote").summernote({
<<<<<<< HEAD
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        // height: 190,
        // minHeight: null,
        // maxHeight: null,
        // focus: !1
=======
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
    }), $(".inline-editor").summernote({
        airMode: !0
    })
}), window.edit = function() {
    $(".click2edit").summernote()
}, window.save = function() {
    $(".click2edit").summernote("destroy")
};
