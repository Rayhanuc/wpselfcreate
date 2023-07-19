jQuery(document).ready(function($) {
  // Function to handle the media library
  function openMediaLibrary() {
    var imageGallery = wp.media({
      title: 'Select Images',
      multiple: true,
      library: { type: 'image' },
      button: { text: 'Select' }
    });

    imageGallery.on('select', function() {
      var attachments = imageGallery.state().get('selection').toArray();
      var imageURLs = [];

      // Get the URLs of selected images
      attachments.forEach(function(attachment) {
        imageURLs.push(attachment.attributes.url);
      });

      // Update the hidden input field and preview images
      $('#project-preview-images-field').val(imageURLs.join(','));
      updatePreviewImages(imageURLs);
    });

    imageGallery.open();
  }

  // Function to update the preview images
  function updatePreviewImages(imageURLs) {
    var container = $('#project-preview-images-container');
    container.empty();

    imageURLs.forEach(function(imageURL) {
      var image = $('<img>', {
        src: imageURL,
        width: '100',
        height: '100'
      });

      var previewImage = $('<div>', {
        class: 'project-preview-image'
      }).append(image);

      container.append(previewImage);
    });
  }

  // Event handler for the button click
  $('#project-preview-images-upload').on('click', function() {
    openMediaLibrary();
  });

  // Initial update of preview images
  var initialImageURLs = $('#project-preview-images-field').val().split(',');
  updatePreviewImages(initialImageURLs);
});
