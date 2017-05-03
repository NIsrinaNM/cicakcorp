(function() {
  'use strict';

  class FileUploader {
    cache() {
      this.$fileInput = document.querySelector('input');
      this.$img = document.querySelector('img');
      this.$label = document.querySelector('label');
    }

    events() {
      this.$fileInput.addEventListener('change', this._handleInputChange.bind(this));
      this.$img.addEventListener('load', this._handleImageLoaded.bind(this));
      this.$label.addEventListener('dragenter', this._handleDragEnter.bind(this));
      this.$label.addEventListener('dragleave', this._handleDragLeave.bind(this));
      this.$label.addEventListener('drop', this._handleDrop.bind(this));
    }

    init() {
      this.cache();
      this.events();
    }

    _handleDragEnter(e){
      e.preventDefault();

      if (!this.$label.classList.contains('dragging')) {
        this.$label.classList.add('dragging');
      }
    }

    _handleDragLeave(e) {
      e.preventDefault();

      if (this.$label.classList.contains('dragging')) {
        this.$label.classList.remove('dragging');
      }
    }

    _handleDrop(e) {
      e.preventDefault();
      this.$label.classList.remove('dragging');

      this.$img.files = e.dataTransfer.files;
      this._handleInputChange();
    }

    _handleImageLoaded() {
      if (!this.$img.classList.contains('loaded')) {
        this.$img.classList.add('loaded');
      }
    }

    _handleInputChange(e) {
      var file = (undefined !== e)
      ? e.target.files[0]
      : this.$img.files[0];

      var pattern = /image-*/;
      var reader = new FileReader();

      if (!file.type.match(pattern)) {
        alert('invalid format');
        return;
      }

      this.$img.src = "";

      reader.onload = this._handleReaderLoaded.bind(this);

      if (this.$label.classList.contains('loaded')) {
        this.$label.classList.remove('loaded');
      }

      this.$label.classList.add('loading');

      reader.readAsDataURL(file);
    }

    _handleReaderLoaded(e) {
      var reader = e.target;
      this.$img.src = reader.result;
      this.$label.classList.remove('loading');
      this.$label.classList.add('loaded');
    }
  }

  var fileUploader = new FileUploader();
  fileUploader.init();

} ());



var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv',
style:'display: inline-block;'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
id: 'file',
style:'display: inline-block;',
})));
});
// Following function will executes on change event of file input to select different file.
$('body').on('change', '#file', function() {

if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='abcd" + abc + "' class='abcd' style='display:inline-table'><img id='previewimg" + abc + "' src='' style='height: 100px;width: 100px;'/></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd" + abc).append($("<img/>", {
id: 'img',
src: 'x.png',
alt: 'delete'
}).click(function() {
$(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("First Image Must Be Selected");
e.preventDefault();
}
});
});

