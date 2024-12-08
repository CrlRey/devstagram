import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'sube aqui tu imagen',
    acceptedFiles: '.png, .jpg, .jpge, .gif ',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo ',
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
                imagenPublicada.size = 1324;
                imagenPublicada.name = document.querySelector('[name="imagen"]').value;
               console.log( typeof(imagenPublicada.name));
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

                imagenPublicada.previewElement.classList.add('dz-succes', 'dz-complete');


        }
    }

});


dropzone.on('sending', function(file, xhr, formData) {
    console.log(file);
})


dropzone.on('success', function(file, response) {
    console.log(response.imagen);
    document.querySelector('[name="imagen"]').value = response.imagen;


})

dropzone.on('error', function(file, message) {
    console.log(message);
})

dropzone.on('removedfile', function() {
    document.querySelector('[name="imagen"]').value = "";
})

