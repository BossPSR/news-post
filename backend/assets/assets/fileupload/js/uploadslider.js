$(function () {

    
    $('#progress').hide();
    $('#fileupload').fileupload({
     url: baseurl + 'Admin_slider/upload',
        dataType: 'json',
        done: function (e, data) {
        
            $('#progress').hide();
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });

            $('#show_img').append('<img src="' + data.result.showImage + '" style= "width:300px;height:200px"/>');
            $('#profile_avatar').val(data.result.filename);
        },
        progressall: function (e, data) {
            $('#progress').show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


 function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };

   function previewImagecate() {
    document.getElementById("image-previewcate").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-sourcecate").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-previewcate").src = oFREvent.target.result;
    };
  }; 

  function previewImagenar() {
    document.getElementById("image-previewnar").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-sourcenar").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-previewnar").src = oFREvent.target.result;
    };
  };
