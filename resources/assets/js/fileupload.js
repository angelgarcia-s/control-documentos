(function () {
  "use strict";

  /* default input */
  const dropzoneElement = document.querySelector('.dropzone');
  if (dropzoneElement) {
    let myDropzone = new Dropzone(".dropzone");
    myDropzone.on("addedfile", file => {
      // ...
    });
  }

  /**** Filepond js****/
  FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateSize,
    FilePondPluginImageEdit,
    FilePondPluginFileValidateType,
    FilePondPluginImageCrop,
    FilePondPluginImageResize,
    FilePondPluginImageTransform
  );

  const SingleElement = document.querySelector('.basic-filepond');
  const MultipleElement = document.querySelector('.multiple-filepond');
  const CircularElement = document.querySelector('.circular-filepond');

  if (SingleElement) FilePond.create(SingleElement);
  if (MultipleElement) FilePond.create(MultipleElement);
  if (CircularElement) FilePond.create(CircularElement, {
    labelIdle: `<span class="filepond--label-action">Choose File</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  });
})();
