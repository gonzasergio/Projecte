<?php


class PointController extends Controller {

    public function __construct() {
        $this->DAO = new PointDao();
    }

    public function getFirstZoneOfAllRoutes(){
        $geoJson = '{
        "type": "FeatureCollection",
        "features": [';
        $points = $this->DAO->getFirstZoneOfAllRoutes();

        for( $i = 0 ; $i < sizeof($points) ; $i++) {
            $cor = $points[$i]->toArray();
            $coma = ($i == sizeof($points)-1) ? '' : ',';

            $geoJson = $geoJson . '{
              "type": "Feature",
              "properties": {},
              "geometry": {
                "type": "Point",
                "coordinates": [
                  '. $cor['y'] .',
                  '. $cor['x'] .'
                ]
              }
            }' . $coma;

        }

        $geoJson = $geoJson . '  ]
        }';


        echo $geoJson;
    }

    public function getRoute($param){
        $geoJson = '{
          "type": "FeatureCollection",
          "features": [
            {
              "type": "Feature",
              "properties": {},
              "geometry": {
                "type": "LineString",
                "coordinates": [';
        $points = $this->DAO->getRoutesZone($param['id']);

        for( $i = 0 ; $i < sizeof($points) ; $i++) {
            $cor = $points[$i]->toArray();
            $coma = ($i == sizeof($points)-1) ? '' : ',';

            $geoJson = $geoJson . ' [
                  '. $cor['y'] .',
                  '. $cor['x'] .'
                ]' . $coma;

        }

        $geoJson = $geoJson . '  ]
              }
            }
          ]
        }';


        echo $geoJson;
    }

}