<?php
require_once __DIR__."/../config/config.php";

// Default values
$page = 1;
$resultsPerPage = 4;
$query = "";
$sort = "last";

if(isset($_POST['page']) && !empty($_POST['page'])) {
    $page = filter_var($_POST['page'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($page === false) {
        $page = 1;
    }
}

if(isset($_POST['resultatsPerPage']) && !empty($_POST['resultatsPerPage'])) {
    $resultsPerPage = filter_var($_POST['resultatsPerPage'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($resultsPerPage === false) {
        $resultsPerPage = 4;
    }
}

if(isset($_POST['motClé']) && !empty($_POST['motClé'])) {
    $query =$_POST['motClé'];
    $query = "%$query%";
}

if(isset($_POST['sort']) && !empty($_POST['sort'])) {
    $sort = $_POST['sort'];
}

$offset = ($page - 1) * $resultsPerPage;

$base = "SELECT id, carName, brand, mileage, price, photoNames, options FROM cars";

if (!empty($query)) {
    $base .= " WHERE carName LIKE :query OR brand LIKE :query OR options like :query";
}

switch ($sort) {
    case 'peuCher':
        $base .= " ORDER BY price ASC";
        break;
    case 'Plus-cher':
        $base .= " ORDER BY price DESC";
        break;
    case 'lower_mileage':
        $base .= " ORDER BY mileage ASC";
        break;
    case 'last':
    default:
        $base .= " ORDER BY id DESC";
        break;
}

$base .= " LIMIT :resultsPerPage OFFSET :offset";

$statement = $pdo->prepare($base);

if (!empty($query)) {
    $statement->bindValue(':query', $query, PDO::PARAM_STR);
}

$statement->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
$statement->execute();
$resultbase = $statement->fetchAll(PDO::FETCH_ASSOC);



$totalCarsQuery = "SELECT COUNT(*) as totalCars FROM cars";

if (!empty($query)) {
    $totalCarsQuery .= " WHERE carName LIKE :query OR brand LIKE :query";
}

$totalCarsStatement = $pdo->prepare($totalCarsQuery);

if (!empty($query)) {
    $totalCarsStatement->bindValue(':query', $query, PDO::PARAM_STR);
}

$totalCarsStatement->execute();
$totalCars = $totalCarsStatement->fetch(PDO::FETCH_ASSOC)['totalCars'];

$totalPages = ceil($totalCars / $resultsPerPage);

$response = [
    'cars' => $resultbase,
    'totalPages' => $totalPages,
    'currentPage' => $page,
];
header('Content-Type: application/json');
echo json_encode($response);