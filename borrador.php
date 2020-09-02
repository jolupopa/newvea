<?php

init: function() {
    const galeria = document.querySelectorAll('.galeria');
    //console.log(galeria),
    if(galeria.length > 0) {
      galeria.forEach( imagen => {
        const imagenPublicada = {};
        imagenPublicada.size = 1,
        imagenPublicada.name = imagen.value;
        imagenPublicada.nombreServidor = imagen.value;

        this.options.addedfile.call(this, imagenPublicada);
        this.options.thumbnail.call(this, imagenPublicada, `/storage/${imagenPublicada.name}`);

        imagenPublicada.previewElement.classList.add('dz-success');
        imagenPublicada.previewElement.classList.add('dz-complete');
      })
    }
  }
  
  success: function(file, respuesta) { 
      console.log(file);
      console.log(respuesta); 
            file.nombreServidor = respuesta.archivo;
    },

  sending: function(file, xhr, formData ) { formData.append('uuid', document.querySelector('#uuid').value },

    removedfile: function(file, respuesta) {
      console.log(file) 
      const params: {
        imagen: file.nombreServidor 
      }
      axios.post('imagenes/destroy', params)
        .then( respuesta => {
          console.log(respuesta);
        })
    }


    let str = imagen.value;
    let longitud = str.length;
    let pos = str.search("-");
    let url_img =  str.slice(0, pos);
    let id_img = str.slice(pos+1, longitud)
    console.log(url_img);
    // console.log(id_img);
    imagenPublicada.name = 'storage/properties/'+url_img;
    this.options.addedfile.call(this, imagenPublicada);
    this.options.thumbnail.call(this, imagenPublicada, `/${imagenPublicada.name}`);
    imagenPublicada.previewElement.classList.add('dz-success');
    imagenPublicada.previewElement.classList.add('dz-complete');


    // otro
    onDrop={acceptedFiles => {
      // do nothing if no files
      let handleDropImages;
      if (acceptedFiles.length === 0) {
        return;
      } else if(acceptedFiles.length > 5){ // here i am checking on the number of files
        return notify('maxImages'); // here i am using react toaster to get some notifications. don't need to use it 
      }else {
        // do what ever you want 
      }

    }}

// otro
    Dropzone.autoDiscover = false;

var myDropzone = new Dropzone(".dropzone", { 
   autoProcessQueue: false,
   parallelUploads: 10 // Number of files process at a time (default 2)
});

$('#uploadfiles').click(function(){
   myDropzone.processQueue();
});
// otro
<script type="text/javascript">
   Dropzone.options.dropzone = {
        accept: function(file, done) {
            console.log(file);
            if (file.type != "image/jpeg") {
                done("Error! Files of this type are not accepted");
            }
            else { done(); }
        }
    }
 </script>


