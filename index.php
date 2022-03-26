<?php
    // Add database and table functions
    require('./model/config.php');
    require('./model/crud.php');
   
    // Set variables for filters
    $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
    $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
    $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_VALIDATE_INT);
    $sortDirection = filter_input(INPUT_GET, 'sortDirection', FILTER_VALIDATE_INT);

    // Set array of results for filters
    $types = get_types();
    $classes = get_classes();
    $makes = getMakes();

    // Set array of all vehicles matching filter selections
    $vehicles = get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection);

    // Include required files
    include('view/nav.php');
    include('view/vehicle_list.php');
    include('view/footer.php');
