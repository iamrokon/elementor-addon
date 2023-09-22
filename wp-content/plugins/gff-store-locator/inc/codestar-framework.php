<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'gff-store-locator-options';
  
    //
    // Create options
    CSF::createOptions( $prefix, array(
      'menu_title' => 'GFF Store Locator',
      'menu_slug'  => 'gff-store-locator',
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
    //   'title'  => 'Tab Title 1',
      'fields' => array(
  
        //
        // A text field
        array(
          'id'    => 'api-key',
          'type'  => 'text',
          'title' => 'Google Map Api Key',
        ),
  
      )
    ) );



    // Set a unique slug-like ID
    $prefix = 'gff_store_locator_meta';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'     => 'Options',
        'post_type' => 'gff-store-map',
        'data_type' => 'unserialize',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'fields' => array(
        array(
            'id'    => 'map_type',
            'type'  => 'select',
            'title' => 'Map Type',
            'options' => [
                'google_map' => 'Google Map',
                'openstreat_map' => 'Openstreat Map',
            ]
        ),
        array(
            'id'    => 'maps',
            'type'  => 'group',
            'title' => 'Maps',
            'fields' => [
                [
                    'id' => 'title',
                    'type' => 'text',
                    'title' => 'Title',
                ],
                [
                    'id' => 'latitude',
                    'type' => 'text',
                    'title' => 'Latitude',
                ],
                [
                    'id' => 'longitude',
                    'type' => 'text',
                    'title' => 'Longitude',
                ],
                [
                    'id' => 'address',
                    'type' => 'text',
                    'title' => 'Address',
                ],
                [
                    'id' => 'phone',
                    'type' => 'text',
                    'title' => 'Phone',
                ],
                [
                    'id' => 'hours',
                    'type' => 'text',
                    'title' => 'Hours',
                ],
                [
                    'id' => 'website',
                    'type' => 'text',
                    'title' => 'Website',
                ],
            ]
        ),

        )
    ) );
  
  }