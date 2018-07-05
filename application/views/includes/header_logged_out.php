<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

$this->load->view("includes/translations");

if(empty($this->session->userdata('user_id'))) {
  $sorry = $GLOBALS['Sorry, to view this page you need to be loggedin or register'];
  $this->session->set_flashdata("failed", "$sorry");
  header("Location: " . base_url());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Area Canaria
    </title>

    <meta name="keywords" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/site_img/area_canaria_tab_logo.ico'); ?>" type="image/x-icon">

    <!-- styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.css'); ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>"/>
    <link href="<?php echo base_url('assets/css/style.default.css'); ?>" rel="stylesheet" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>" type="text/css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" />
    <link rel="shortcut icon" href="favicon.png">

    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 28.29156369999999, lng: -16.629130400000008},
            zoom: 8
          });
          var input = /** @type {!HTMLInputElement} */(
              document.getElementById('pac-input'));

          var types = document.getElementById('type-selector');
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

          var autocomplete = new google.maps.places.Autocomplete(input);
          autocomplete.bindTo('bounds', map);

          var infowindow = new google.maps.InfoWindow();
          var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
          });

          autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
              // User entered the name of a Place that was not suggested and
              // pressed the Enter key, or the Place Details request failed.
              window.alert("No details available for input: '" + place.name + "'");
              return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
              map.fitBounds(place.geometry.viewport);
            } else {
              map.setCenter(place.geometry.location);
              map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setIcon(/** @type {google.maps.Icon} */({
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
    var item_Lat =place.geometry.location.lat();
    var item_Lng= place.geometry.location.lng();
    var item_Location = place.formatted_address;
    //alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
    $("#lat").val(item_Lat);
    $("#lng").val(item_Lng);
    $("#location").val(item_Location);



            var address = '';
            if (place.address_components) {
              address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
              ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);
          });

          // Sets a listener on a radio button to change the filter type on Places
          // Autocomplete.
          function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function() {
              autocomplete.setTypes(types);
            });
          }

          setupClickListener('changetype-all', []);
          setupClickListener('changetype-address', ['address']);
          setupClickListener('changetype-establishment', ['establishment']);
          setupClickListener('changetype-geocode', ['geocode']);
        }


      </script>
      <script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyACKJBGE39ESFPS3fCDiY7hH9MdPfIf6CA&callback=initMap'></script>



</head>

<body>
