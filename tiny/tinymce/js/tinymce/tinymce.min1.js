
            tinymce.init({
                selector: "textarea.mceEditor",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste",
          "textcolor colorpicker"
                ],
                mode : "specific_textareas",
                toolbar: "insertfile undo redo | styleselect | bold underline italic | fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | mybutton",
                fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        height:200,
                setup: function(editor) {
                    editor.addButton('mybutton', {
                        text:"Upload Image",
                        class:"mce-ico mce-i-image",
                        icon: false,
                        onclick: function(e) {
                            console.log($(e.target));
                            if($(e.target).prop("tagName") == 'BUTTON'){
            console.log($(e.target).parent().parent().find('input').attr('id'));
                                if($(e.target).parent().parent().find('input').attr('id') != 'tinymce-uploader') {
                                    $(e.target).parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                }
                                $('#tinymce-uploader').trigger('click');
                                $('#tinymce-uploader').change(function(){
                                    var input, file, fr, img;
                                    if (typeof window.FileReader !== 'function') {
                                        write("The file API isn't supported on this browser yet.");
                                        return;
                                    }
                                    input = document.getElementById('tinymce-uploader');
                                    if (!input) {
                                        write("Um, couldn't find the imgfile element.");
                                    }else if (!input.files) {
                                        write("This browser doesn't seem to support the `files` property of file inputs.");
                                    }else if (!input.files[0]) {
                                        write("Please select a file before clicking 'Load'");
                                    }else {
                                        file = input.files[0];
                                        fr = new FileReader();
                                        fr.onload = createImage;
                                        fr.readAsDataURL(file);
                                    }
                                    function createImage() {
                                        img = new Image();
                                        img.src = fr.result;
                                        editor.insertContent('<img style="border:none;" src="'+img.src+'"/>');
                                    }
                                });
                            }
                            if($(e.target).prop("tagName") == 'DIV'){
                                if($(e.target).parent().find('input').attr('id') != 'tinymce-uploader') {
                                    console.log($(e.target).parent().find('input').attr('id'));                                
                                    $(e.target).parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                }
                                $('#tinymce-uploader').trigger('click');
                                $('#tinymce-uploader').change(function(){
                                    var input, file, fr, img;
                                    if (typeof window.FileReader !== 'function') {
                                        write("The file API isn't supported on this browser yet.");
                                        return;
                                    }
                                    input = document.getElementById('tinymce-uploader');
                                    if (!input) {
                                        write("Um, couldn't find the imgfile element.");
                                    }else if(!input.files) {
                                        write("This browser doesn't seem to support the `files` property of file inputs.");
                                    }else if(!input.files[0]) {
                                        write("Please select a file before clicking 'Load'");
                                    }else{
                                        file = input.files[0];
                                        fr = new FileReader();
                                        fr.onload = createImage;
                                        fr.readAsDataURL(file);
                                    }
                                    function createImage() {
                                        img = new Image();
                                        img.src = fr.result;
                                        editor.insertContent('<img style="border:none;" src="'+img.src+'"/>');
                                    }
                                });
                            }
                            if($(e.target).prop("tagName") == 'I'){
                                console.log($(e.target).parent().parent().parent().find('input').attr('id')); if($(e.target).parent().parent().parent().find('input').attr('id') != 'tinymce-uploader') {               
                                    $(e.target).parent().parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                }
                                $('#tinymce-uploader').trigger('click');
                                $('#tinymce-uploader').change(function(){
                                    var input, file, fr, img;
                                    if (typeof window.FileReader !== 'function') {
                                        write("The file API isn't supported on this browser yet.");
                                        return;
                                    }
                                    input = document.getElementById('tinymce-uploader');
                                    if (!input) {
                                        write("Um, couldn't find the imgfile element.");
                                    }else if (!input.files) {
                                        write("This browser doesn't seem to support the `files` property of file inputs.");
                                    }else if (!input.files[0]) {
                                        write("Please select a file before clicking 'Load'");
                                    }else {
                                        file = input.files[0];
                                        fr = new FileReader();
                                        fr.onload = createImage;
                                        fr.readAsDataURL(file);
                                    }
                                    function createImage() {
                                        img = new Image();
                                        img.src = fr.result;
                                         editor.insertContent('<img style="border:none;" src="'+img.src+'"/>');
                                    }
                                });
                            }
                        }
                    });
                }
            });
        