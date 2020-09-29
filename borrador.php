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

//  javascript incremento y decremento

 <div class="def-number-input number-input safari_only mb-0 w-100">
  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
    class="minus decrease"></button>
  <input class="quantity" min="0" name="quantity" value="1" type="number">
  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
    class="plus increase"></button>
</div>



remove array duplicados

var arrayWithDuplicates = [
  {"type":"LICENSE", "licenseNum": "12345", state:"NV"},
  {"type":"LICENSE", "licenseNum": "A7846", state:"CA"},
  {"type":"LICENSE", "licenseNum": "12345", state:"OR"},
  {"type":"LICENSE", "licenseNum": "10849", state:"CA"},
  {"type":"LICENSE", "licenseNum": "B7037", state:"WA"},
  {"type":"LICENSE", "licenseNum": "12345", state:"NM"}
];

function removeDuplicates(originalArray, prop) {
   var newArray = [];
   var lookupObject  = {};

   for(var i in originalArray) {
      lookupObject[originalArray[i][prop]] = originalArray[i];
   }

   for(i in lookupObject) {
       newArray.push(lookupObject[i]);
   }
    return newArray;
}

var uniqueArray = removeDuplicates(arrayWithDuplicates, "licenseNum");
console.log("uniqueArray is: " + JSON.stringify(uniqueArray));


