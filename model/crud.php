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

function addType($name)
{
    global $db;
    $query = 'INSERT INTO type (name) VALUES (:name)';

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function getMakes()
{
    global $db;
    
    $query = 'SELECT *
                FROM makes
                ORDER BY id';

    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function deleteMake($id)
{
    global $db;

    $query = 'DELETE FROM makes
                WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function addMake($name)
{
    global $db;

    $query = 'INSERT INTO makes (name) VALUES (:name)';

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection)
{

    global $db;
    $bindValues = [];
    $bindCount = 0;

    $query = 'SELECT vehicleID, year, makes.name, model, price, type.name, class.name
                FROM vehicles
                LEFT JOIN makes on vehicles.makeID = makes.id
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
        $query .= 'makes.id = :makeID';
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
function deleteVehicle($id)
{
    global $db;
    // Get item based on item ID
    $query = 'DELETE FROM vehicles WHERE id = :id';
    // PDO delete item from database
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

// // Add to do item to database
function addVehicle($year, $makeID, $model, $typeID, $classID, $price)
{

    global $db;
    // Set query for item to be added
    $query = 'INSERT INTO vehicles (year, makeID, model, typeID, classID, price)
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

function deleteClass($id)
{
    global $db;
    
    $query = 'DELETE FROM class
                WHERE classID = :classID';

    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $id);
    $statement->execute();
    $statement->closeCursor();
}

function addClass($name)
{
    global $db;
    
    $query = 'INSERT INTO class (name)
                VALUES (:name)';

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}