
tinymce.init({
    selector: '#tinyMCE',  // Replace this with your textarea selector
    plugins: 'lists advlist link image media table code',
    toolbar: 'undo redo | bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link image media | code',
    menubar: false,
    });
// tinymce.init({
//   selector: '#tinyMCE',
//   plugins: 'media',
//   toolbar: 'media',
//   media_live_embeds: true  // Allow live embedding of video URLs like YouTube
// });

tinymce.init({
  selector: '#tinyMCE',
  plugins: 'image media link',
  toolbar: 'undo redo | bold italic | image media link | code',
  images_upload_url: 'upload_media.php',  // Video and image upload URL
  automatic_uploads: true,
  file_picker_types: 'image media',
  media_live_embeds: true,  // Embed live video URLs
  media_alt_source: false,  // Option to disable alt source to force local upload
  media_dimensions: true
});

tinymce.init({
    selector: '#tinyMCE',
    plugins: 'image media',
    toolbar: 'undo redo | image media',
    images_upload_url: '/upload', // URL for file upload
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (callback, value, meta) {
      if (meta.filetype === 'image') {
        // Create a file input element to allow file selection
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function () {
            // Call the callback with the image URL
            callback(reader.result, {
              alt: file.name
            });
          };
          reader.readAsDataURL(file);
        };
        input.click();
      }
    }
  });
  