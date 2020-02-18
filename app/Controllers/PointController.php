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
                  '. $cor['x'] .',
                  '. $cor['y'] .'
                ]
              }
            }' . $coma;

        }

        $geoJson = $geoJson . '  ]
        }';


        echo $geoJson;
    }

}