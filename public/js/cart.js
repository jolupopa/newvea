// Variables
const carrito = document.getElementById('carrito');

const anuncios = document.getElementById('lista-anuncios');
const listaAnuncios = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito'); 
const items = document.getElementById('lista-items');





// Listeners
cargarEventListeners();

function cargarEventListeners() {
     // Dispara cuando se presiona "Agregar Carrito"
     anuncios.addEventListener('click', comprarAnuncio);

     // Cuando se elimina un anuncio del carrito
     carrito.addEventListener('click', eliminarAnuncio);

     // Al Vaciar el carrito
     vaciarCarritoBtn.addEventListener('click', vaciarCarrito);

     // Al cargar el documento, mostrar LocalStorage
		document.addEventListener('DOMContentLoaded', leerLocalStorage);
		
		// Al incrementar o decrementar cantidad
		items.addEventListener('click', actualizaMontos);
	
		
		
}

function actualizaMontos(e) {
	
	e.preventDefault();

	

	 // fila de item incrementado o decremento
	 const item = e.target.parentElement.parentElement.parentElement;
	 
	 console.log(e.target.classList);
	if(e.target.classList.contains('incremento')){
		//suma obtiene datos opera y actualiza parcial
		leerDatosItem(item);
		localStorageUpdateFromIncrement(item);
		
	}else if(e.target.classList.contains('decremento')){
		//resta obtiene datos opera y actualiza parcial
		leerDatosItem(item);
		localStorageUpdateFromDecrement(item);
		
	}	
	obtenerTotal();
}

function leerDatosItem(item){

	const infoItem = {
		precio: item.querySelector('.price').textContent,
		partial: item.querySelector('.partial').textContent,
		qty: item.querySelector('.qty').value,
		id: item.querySelector('a').getAttribute('data-id')
	}
	actualizaParcial(infoItem, item);

}

function actualizaParcial(infoItem, item) {
let partial;	
	partial = infoItem.qty*infoItem.precio;
	item.querySelector('.partial').innerHTML= partial.toFixed(2);
}

//onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
// onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
function localStorageUpdateFromIncrement(item) {
		//actualizar localstorage
		let lista_items;
		lista_items = localStorage.getItem('anuncios');
		lista_items = JSON.parse(lista_items);
		

		let id_sel = item.querySelector('a').getAttribute('data-id')
		

		for (var i = 0; i < lista_items.length ; i++) {
			if(id_sel === lista_items[i].id){
					if(lista_items[i].cantidad < 10) {
						lista_items[i].cantidad++;
					}	
						break;  //exit loop since you sum
			}
	 }
	 
		 localStorage.setItem("anuncios", JSON.stringify(lista_items));
		
		

}

function localStorageUpdateFromDecrement(item) {
		//actualizar localstorage
		let lista_items;
		lista_items = localStorage.getItem('anuncios');
		lista_items = JSON.parse(lista_items);

		let id_sel = item.querySelector('a').getAttribute('data-id')
		for (var i = 0; i < lista_items.length; i++) {
			if(id_sel === lista_items[i].id){
					if(lista_items[i].cantidad > 1) {
						lista_items[i].cantidad -= 1;
					}
					break;  //exit loop since you sum
					
			}
	 }
	 	
	 	localStorage.setItem("anuncios", JSON.stringify(lista_items));

}

function obtenerTotal(){

	let lista_items;
	lista_items = localStorage.getItem('anuncios');
	lista_items = JSON.parse(lista_items);
	let total = lista_items.reduce(function(tot, record){
		return tot + parseFloat(record.precio) * record.cantidad;
	},0);
	document.querySelector('#total').innerHTML= total.toFixed(2);

	//console.log(total);

}

function cargarValorOculto(){

let valorLS =  localStorage.getItem('anuncios');
// vacio null
document.getElementById('ls').value = valorLS;


}


// Funciones
// Función que añade el anuncio al carrito
function comprarAnuncio(e) {
	e.preventDefault();
	// Delegation para agregar-carrito

	if(e.target.classList.contains('agregar-carrito')) {
			 const anuncio = e.target.parentElement.parentElement.parentElement;
			 // Enviamos el curso seleccionado para tomar sus datos
			 leerDatosAnuncio(anuncio);
	}
}
// Lee los datos del anuncio
function leerDatosAnuncio(anuncio) {
	// crea el objeto infoAnuncio
	const infoAnuncio = {		
			 titulo: anuncio.querySelector('h5').textContent,
			 cantidad: 1,
			 precio: anuncio.querySelector('.card-footer span').textContent,
			 id: anuncio.querySelector('a').getAttribute('data-id')
	}
	
	// verificar si ya existe
	let lista;
	lista = obtenerAnunciosLocalStorage();
	if( lista.findIndex( anuncio => anuncio.id  == infoAnuncio.id ) == -1) {
		insertarCarrito(infoAnuncio);
		obtenerTotal();
		cargarValorOculto();
		
	}

}

// Muestra el anuncio seleccionado en el Carrito
function insertarCarrito(anuncio) {
	const row = document.createElement('tr');
	let partial =
	row.innerHTML = `
			<td>${anuncio.titulo}</td>
			<td class="text-right price">${anuncio.precio}</td>
			<td>		
					<div class="d-flex justify-content-center" style="width:70px;">
						<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="m-0 p-1 decremento">-</button>
						<input type="number" min=1 max=10  value="${anuncio.cantidad}" class="text-right form-control qty" style="width: 4em;" readonly>
						<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="m-0 p-1 incremento">+</button>
					</div>
			</td>
			<td class="text-right partial">${(anuncio.precio * anuncio.cantidad).toFixed(2)}</td>
			<td>
				<a href="#"  data-id="${anuncio.id}"> <i class="fas fa-times text-danger borrar-anuncio"></i></a>
			</td>
			 
	`;
	listaAnuncios.appendChild(row);

	guardarAnuncioLocalStorage(anuncio);

}

// Elimina el anuncio del carrito en el DOM
function eliminarAnuncio(e) {
	e.preventDefault();

	let anuncio,
		 anuncioId;
		
	if(e.target.classList.contains('borrar-anuncio') ) {
	

			 e.target.parentElement.parentElement.parentElement.remove();
			 anuncio = e.target.parentElement.parentElement.parentElement;
			 anuncioId = anuncio.querySelector('a').getAttribute('data-id');

	}
	
	 eliminarAnuncioLocalStorage(anuncioId);
	 obtenerTotal();
	 cargarValorOculto();
}

// Elimina los cursos del carrito en el DOM
function vaciarCarrito() {
	// forma lenta
	// listaAnuncios.innerHTML = '';
	// forma rapida (recomendada)
	while(listaAnuncios.firstChild) {
			 listaAnuncios.removeChild(listaAnuncios.firstChild);
	}
	
	// Vaciar Local Storage
	vaciarLocalStorage();
	document.querySelector('#total').innerHTML= '0.00';
	cargarValorOculto();
	

	return false;
}

// Almacena anuncios en el carrito a Local Storage

function guardarAnuncioLocalStorage(anuncio) {

 let anuncios;
	// Toma el valor de un arreglo con datos de LS o vacio
 anuncios = obtenerAnunciosLocalStorage();
 
		
		
			// el curso seleccionado se agrega al arreglo
			anuncios.push(anuncio);

			localStorage.setItem('anuncios', JSON.stringify(anuncios) );
	
}


// Comprueba que haya elementos en Local Storage
function obtenerAnunciosLocalStorage() {
	let anunciosLS;

	// comprobamos si hay algo en localStorage
	if(localStorage.getItem('anuncios') === null) {
			 anunciosLS = [];
	} else {
			 anunciosLS = JSON.parse( localStorage.getItem('anuncios') );
	}
	return anunciosLS;

}

// Imprime los cursos de Local Storage en el carrito
function leerLocalStorage() {
 let anunciosLS;

 anunciosLS = obtenerAnunciosLocalStorage();

 anunciosLS.forEach(function(anuncio){
		 // construir el template
		 const row = document.createElement('tr');
		 row.innerHTML = `
				<td>${anuncio.titulo}</td>
				<td class="text-right price">${anuncio.precio}</td>
				<td>		
						<div class="d-flex justify-content-center" style="width:70px;">
							<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"  class="m-0 p-1 decremento">-</button>
							<input type="number" min=1 max=10 value="${anuncio.cantidad}" class="text-right form-control qty"style="width: 4em;" readonly>
							<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="m-0 p-1 incremento">+</button>
						</div>
				</td>
				<td class="text-right partial">${(anuncio.precio*anuncio.cantidad).toFixed(2)}</td>
				<td>
					<a href="#"  data-id="${anuncio.id}"> <i class="fas fa-times text-danger borrar-anuncio"></i></a>
				</td>
		 `;
		 listaAnuncios.appendChild(row);
		 obtenerTotal();
		 

 });
 cargarValorOculto();
}

// Elimina el curso por el ID en Local Storage
function eliminarAnuncioLocalStorage(anuncio) {
 let anunciosLS;
 // Obtenemos el arreglo de anuncios
 anunciosLS = obtenerAnunciosLocalStorage();
 // Iteramos comparando el ID del anuncio borrado con los del LS
 anunciosLS.forEach(function(anuncioLS, index) {
		 if(anuncioLS.id === anuncio) {
				 anunciosLS.splice(index, 1);
		 }
 });
 // Añadimos el arreglo actual a storage
 localStorage.setItem('anuncios', JSON.stringify(anunciosLS) );
}

// Elimina todos los anuncios de Local Storage
function vaciarLocalStorage() {
 localStorage.clear();

}
