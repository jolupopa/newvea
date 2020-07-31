@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
Listado de propiedades por ciudad especifica.
@endsection

@section('content')
 @include('frontend.pages.properties.by_cities.menu_icons')  

  @include('frontend.pages.properties.by_cities.lista')  
@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

@push('load-plugin')
 <script>
    /*----------------------------------------------------*/
    /*  cambiar layout de grid a lista
    /*----------------------------------------------------*/
    $(function(){

    
      $('.layout-grid').on('click', function () {
            $('.layout-grid').addClass('active');
            $('.layout-list').removeClass('active');

            $('#list-type').removeClass('property-th-list');
            $('#list-type').addClass('property-th');

            $('.grid').removeClass('col-lg-6');
            $('.grid').addClass('col-md-6');
            $('.grid').addClass('col-lg-4');
            console.log("grid");
        });

      $('.layout-list').on('click', function () {
          $('.layout-grid').removeClass('active');
          $('.layout-list').addClass('active');

          $('#list-type').addClass('property-th-list');
          $('#list-type').removeClass('property-th');

          $('.grid').removeClass('col-md-6');
          $('.grid').removeClass('col-lg-4');
          $('.grid').addClass('col-lg-6');
          console.log("list");
      });

      // select city
      $("#ciudad").on('change', function(){
          var zon_id = $(this).val();
          $.ajax({
              url: "/zonas/"+zon_id,
              type: "GET",
              dataType: "json",

              success: function(respuesta){
                  //console.log(respuesta);
                      $("#zona").html('<option value="" selected="true"> Seleccione una Zona </option>');
                          respuesta.forEach(element => {
                              $('#zona').append('<option value='+element.id+'> '+element.name+' </option>')
                              });
                  },

              error: function(element){
                  console.log('error');
                  }, 
          }); 
      }); 
  
     
     // personalizar el select

      var x, i, j, selElmnt, a, b, c;
      /*look for any elements with the class "custom-select":*/
      x = document.getElementsByClassName("personal-select");
      for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
          /*for each option in the original select element,
          create a new DIV that will act as an option item:*/
          c = document.createElement("DIV");
          c.innerHTML = selElmnt.options[j].innerHTML;
          c.addEventListener("click", function(e) {
              /*when an item is clicked, update the original select box,
              and the selected item:*/
              var y, i, k, s, h;
              s = this.parentNode.parentNode.getElementsByTagName("select")[0];
              h = this.parentNode.previousSibling;
              for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                  s.selectedIndex = i;
                  h.innerHTML = this.innerHTML;
                  y = this.parentNode.getElementsByClassName("same-as-selected");
                  for (k = 0; k < y.length; k++) {
                    y[k].removeAttribute("class");
                  }
                  this.setAttribute("class", "same-as-selected");
                  break;
                }
              }
              h.click();
          });
          b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
          });
      }
      function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
          if (elmnt == y[i]) {
            arrNo.push(i)
          } else {
            y[i].classList.remove("select-arrow-active");
          }
        }
        for (i = 0; i < x.length; i++) {
          if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
          }
        }
      }
      /*if the user clicks anywhere outside the select box,
      then close all select boxes:*/
      document.addEventListener("click", closeAllSelect);

    });

  </script>
@endpush
