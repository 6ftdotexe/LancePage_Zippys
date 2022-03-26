<?php
function get_types()
{
    global $db;
    $query = 'SELECT * FROM type    ORDER BY typeID';

    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    // Return queried to do vehicles
    return $types;
}

function deleteType($typeID)
{
    global $db;
    $query = 'DELETE FROM type WHERE typeID = :typeID';

    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $statement->closeCursor();
}

function addType($typeName)
{
    global $db;
    $query = 'INSERT INTO type (typeName) VALUES (:typeName)';

    $statement = $db->prepare($query);
    $statement->bindValue(':typeName', $typeName);
    $statement->execute();
    $statement->closeCursor();
}

function getMakes()
{
    global $db;
    // Check if category id greater than 1, not null
    $query = 'SELECT *
                FROM makes
                ORDER BY makeID';

    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    // print_r($makes);
    // Return queried to do vehicles
    return $makes;
}

function deleteMake($makeID)
{
    global $db;
    // Check if category id greater than 1, not null
    $query = 'DELETE FROM makes
                WHERE makeID = :makeID';

    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $statement->closeCursor();
}

function addMake($makeName)
{
    global $db;
    // Check if category id greater than 1, not null
    $query = 'INSERT INTO makes (makeName) VALUES (:makeName)';

    $statement = $db->prepare($query);
    $statement->bindValue(':makeName', $makeName);
    $statement->execute();
    $statement->closeCursor();
}

function get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection)
{

    global $db;
    $bindValues = [];
    $bindCount = 0;
    // Check if category id greater than 1, not null
    $query = 'SELECT vehicleID, year, makes.makeName, model, price, type.typeName, class.className
                FROM vehicles
                LEFT JOIN makes on vehicles.makeID = makes.makeID
                LEFT JOIN type on vehicles.typeID = type.typeID
                LEFT JOIN class on vehicles.classID = class.classID';
    if ($typeID >= 1) {
        $query .= ' WHERE type.typeID = :typeID';
        array_push($bindValues, [':typeID', $typeID]);
        $bindCount++;
    }
    if ($classID >= 1) {
        $query .= $bindCount > 0 ? ' AND ' : ' WHERE ';
        $query .= 'class.classID = :classID';
        array_push($bindValues, [':classID', $classID]);
        $bindCount++;
    }
    if ($makeID >= 1) {
        $query .= $bindCount > 0 ? ' AND ' : ' WHERE ';
        $query .= 'makes.makeID = :makeID';
        array_push($bindValues, [':makeID', $makeID]);
        $bindCount++;
    }
    if ($sort == 1) {
        $query .= ' ORDER BY price';
    } else {
        $query .= ' ORDER BY year';
    }
    if ($sortDirection == 1) {
        $query .= ' ASC';
    } else {
        $query .= ' DESC';
    }

    $statement = $db->prepare($query);
    for ($i = 0; $i < count($bindValues); $i++) {
        $statement->bindValue($bindValues[$i][0], $bindValues[$i][1]);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    // Return queried to do vehicles
    // print_r($vehicles);
    return $vehicles;
}

// Delete item from database
function deleteVehicle($vehicleID)
{
    global $db;
    // Get item based on item ID
    $query = 'DELETE FROM vehicles                WHERE vehicleID = :vehicleID';
    // PDO delete item from database
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
}

// // Add to do item to database
function addVehicle($year, $makeID, $model, $typeID, $classID, $price)
{

    global $db;
    // Set query for item to be added
    $query = 'INSERT INTO vehicles                 (year, makeID, model, typeID, classID, price)
              VALUES
                 (:year, :makeID, :model, :typeID, :classID, :price)';
    // PDO insert item into database
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':makeID', $makeID);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':typeID', $typeID);
    $statement->bindValue(':classID', $classID);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

function get_classes()
{
    global $db;
    // Check if category id greater than 1, not null
    $query = 'SELECT *
                FROM class
                ORDER BY classID';

    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    // Return queried to do vehicles
    return $classes;
}

function deleteClass($classID)
{
    global $db;
    // Check if category id greater than 1, not null
    $query = 'DELETE FROM class
                WHERE classID = :classID';

    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $statement->execute();
    $statement->closeCursor();
}

function addClass($className)
{
    global $db;
    // Check if category id greater than 1, not null
    $query = 'INSERT INTO class (className)
                VALUES (:className)';

    $statement = $db->prepare($query);
    $statement->bindValue(':className', $className);
    $statement->execute();
    $statement->closeCursor();
}