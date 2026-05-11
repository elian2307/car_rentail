import Map from "react-map-gl/mapbox";
import "mapbox-gl/dist/mapbox-gl.css";
export default function MapComponent() {
    const mapToken = import.meta.env.VITE_MAPBOX_ACCESS_TOKEN;
    const initialState = {
        longitude: -107.878650,
        latitude: 30.380583,
        zoom: 12
    };
    return(<>
        <Map
            initialViewState={initialState}
            style={{ width: "100%", height: "100%" }}
            mapStyle="mapbox://styles/mapbox/streets-v11"
            mapboxAccessToken={mapToken}
        />
    </>);
}