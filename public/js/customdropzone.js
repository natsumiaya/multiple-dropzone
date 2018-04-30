var DefaultMessage = '<div id="uploadTrigger" class="col-md-12 col-sm-12 col-xs-12"> <div class="pictureblock"> <div class="block-content"> <div class="table"> <div class="table-cell dzpreview1"> <i class="fas fa-camera"></i> <p>Upload Image</p> </div> </div> </div> </div> <div class="pictureblock"> <div class="block-content"> <div class="table"> <div class="table-cell dzpreview2"> <i class="fas fa-camera"></i> <p>Upload Image</p> </div> </div> </div> </div> <div class="pictureblock"> <div class="block-content"> <div class="table"> <div class="table-cell dzpreview3"> <i class="fas fa-camera"></i> <p>Upload Image</p> </div> </div> </div> </div> <div class="pictureblock"> <div class="block-content"> <div class="table"> <div class="table-cell dzpreview4"> <i class="fas fa-camera"></i> <p>Upload Image</p> </div> </div> </div> </div> </div>';
Dropzone.autoDiscover = false;
myDropzone[0] = new Dropzone("#dropzoneForm",{
	url: "{{ url('uploadImage') }}",
    autoProcessQueue: false,
    uploadMultiple: true,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    dictDefaultMessage: DefaultMessage,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            // formData.append("firstname", jQuery("#firstname").val());
            // formData.append("lastname", jQuery("#lastname").val());
        });
    }
});