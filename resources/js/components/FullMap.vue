<template>
	<div class="mapa">
		<menu-tipo 
		v-on:filtro="listatipoInmueble($event)"
		v-on:listartodos="todosDestacados($event)"
		>
		</menu-tipo>
		<l-map
			:zoom="zoom"
			:center="center" 
			:options="mapOptions"
		>
			<l-tile-layer 
				:url="url" 
				:attribution="attribution"
			 />
			<l-marker
			v-for="property in this.properties "
			v-bind:key="property.id"
			:lat-lng="obtenerCoordenadas(property)"
			:icon="obtenerIcon(property)"
			@click="redireccionar(property.id)"
			>
				<l-tooltip>
					<div>
						{{ property.title}} - {{ property.type_property.name}}
					</div>	
				</l-tooltip>	
			</l-marker>	
		</l-map>
	</div>	
</template>

<script>
import 'leaflet/dist/leaflet.css';
import { latLng } from 'leaflet';
import { LMap, LTileLayer, LMarker, LTooltip, LIcon } from 'vue2-leaflet';

	export default {
			name: 'full-map',
			components: {
				LMap,
				LTileLayer,
				LMarker,
				LTooltip,
				LIcon
			},
			data() {
				return {
					zoom: 13,
					center: latLng(-8.112718, -79.0474042),
					url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
					attribution:
						'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
					currentZoom: 11.5,
					currentCenter: latLng(-8.112718, -79.0474042),
					showParagraph: false,
					mapOptions: {
						zoomSnap: 0.5
					},
					showMap: true,
					properties: []
				};
			},
			created() {
				axios.get('api/destacadas')
					.then( respuesta => {
						this.properties = respuesta.data
						//console.log(respuesta.data);
					})
					.catch( e => console.log(e))
			},
			methods: {
				obtenerCoordenadas(property) {
					return {
						lat: property.latitud,
						lng: property.longitud
					}
				},
				obtenerIcon(property) {
					const { slug } = property.type_property;
					return L.icon({
						iconUrl: `/images/mapicon/${slug}.png`,
						iconSize: [36,42]
					});
				},
				listatipoInmueble: function (type_property) {
					//alert(type_property)
					axios.get(`api/types/${type_property}`)
					.then( respuesta => {
						this.properties = respuesta.data
						//console.log(respuesta.data);
					})
					.catch( e => console.log(e))
				},
				todosDestacados() {
					axios.get('api/destacadas')
					.then( respuesta => {
						this.properties = respuesta.data
						//console.log(respuesta.data);
					})
					.catch( e => console.log(e))
				},
				redireccionar(id) {
				  let urlbase = window.location.origin
					console.log(urlbase);
					window.location.href = `/inmueble/${id}` ;
				}
			}
			

	}
</script>

<style scoped>
.mapa {
	height: 650px;
	width: 100%px;
}
</style>