<?php

$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpFilePath = $_FILES['image']['tmp_name'];

    // Move uploaded file to a desired location
    $uploadPath = $_FILES['image']['name'];
    move_uploaded_file($tmpFilePath, $uploadPath);
    $imagePath = $uploadPath;
}

// Process form data and prepare table row HTML
$rowHTML = '<tr>';
$rowHTML .= '<td>' . $name . '</td>';
$rowHTML .= '<td><img src="' . $imagePath . '" alt="Uploaded Image" class="img-fluid" height="50px" width="50px"></td>';
$rowHTML .= '<td>' . $address . '</td>';
$rowHTML .= '<td>' . $gender . '</td>';
$rowHTML .= '<td><button onclick="deleteRow(this)">Delete</button></td>';
$rowHTML .= '</tr>';

// Send the table row HTML back as the response
echo $rowHTML;



