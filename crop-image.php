<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script name="jquery-croper-script">
!function(e,r){"object"==typeof exports&&"undefined"!=typeof module?r(require("jquery"),require("cropperjs")):"function"==typeof define&&define.amd?define(["jquery","cropperjs"],r):r(e.jQuery,e.Cropper)}(this,function(c,s){"use strict";if(c=c&&c.hasOwnProperty("default")?c.default:c,s=s&&s.hasOwnProperty("default")?s.default:s,c.fn){var e=c.fn.cropper,d="cropper";c.fn.cropper=function(p){for(var e=arguments.length,a=Array(1<e?e-1:0),r=1;r<e;r++)a[r-1]=arguments[r];var u=void 0;return this.each(function(e,r){var t=c(r),n="destroy"===p,o=t.data(d);if(!o){if(n)return;var f=c.extend({},t.data(),c.isPlainObject(p)&&p);o=new s(r,f),t.data(d,o)}if("string"==typeof p){var i=o[p];c.isFunction(i)&&((u=i.apply(o,a))===o&&(u=void 0),n&&t.removeData(d))}}),void 0!==u?u:this},c.fn.cropper.Constructor=s,c.fn.cropper.setDefaults=s.setDefaults,c.fn.cropper.noConflict=function(){return c.fn.cropper=e,this}}});



</script>
</head>
<body>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.css" />


<input type="file" name="source-image" id="sourceImage" onchange="ICropper.readUrl(this);" />
<div class="image-container">
  <img id="cropper-canvas-image" src="#" alt="your image" />
</div>
<div id="cropped-result"></div>
<button onclick="ICropper.cropImage(this)">Crop</button>
</body>
<script type="text/javascript">
	

let ICropper = (function($) {
  let $cropperCanvasImage = $('#cropper-canvas-image');
  return {
    readUrl,
    cropImage
  }


  function readUrl(input) {
    if (input.files && input.files[0]) {
      let reader = new FileReader();
      reader.onload = function(e) {
        $cropperCanvasImage.attr('src', e.target.result)
      };
      reader.readAsDataURL(input.files[0]);
      setTimeout(initCropper, 1000);
    }
  }

  function initCropper() {
    $cropperCanvasImage.cropper({
      aspectRatio: 1 / 1
    });
  }

  function cropImage() {
    let imgUrl = $cropperCanvasImage.data('cropper').getCroppedCanvas().toDataURL();
    let img = document.createElement("img");
    img.src = imgUrl;
    $("#cropped-result").append(img);
  }
})(jQuery);
</script>
</html>