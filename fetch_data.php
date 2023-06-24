<?php
include('config.php');

$sql = "SELECT * FROM notes ";
$query = mysqli_query($conn, $sql);
$count_all_rows = mysqli_num_rows($query);

// for search parameter
// if(isset($_POST['search']['value']) && !empty($_POST['search']['value'])){
//     $search_value = $_POST['search']['value'];

//     $sql .= "WHERE title like '%".$search_value."%' ";
//     $sql .= "WHERE description like '%".$search_value."%' ";
//     $sql .= "WHERE image like '%".$search_value."%' ";
//     $sql .= "WHERE created_at like '%".$search_value."%' ";
// }
 
// for ordering parmeter
if(isset($_POST['order'])){
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= "ORDER BY '".$column."' ".$order;
}else{
    $sql .= "ORDER BY id ASC";
}

// for pagination
if($_POST['length'] != -1){
    $start = $_POST['start'];
    $length = $_POST['length'];

    $sql .= " LIMIT ".$start.", ".$length;
}

// data for table
$data = [];


$run_query = mysqli_query($conn, $sql);

$filtered_row = mysqli_num_rows($run_query);

while($row = mysqli_fetch_assoc($run_query)){
    $subarray = [];
    $subarray[] = $row['id'];
    $subarray[] = $row['title'];
    $subarray[] = $row['description'];
    $subarray[] = $row['image'];
    $subarray[] = $row['created_at'];
    $subarray[] = '<a href="javascript:void(); " class="btn btn-priary">Edit</a><a href="javascript:void();" class="ms-3 btn btn-ddanger">Delete</a>';

    $data[] = $subarray;
}
$output =[
    'data'=>$data,
    'draw'=>intval($_POST['draw']),
    'recordsTotal'=>$count_all_rows,
    'recordsFiltered'=>$filtered_row,
];

echo json_encode($output);
?>