
<?php  
include('includes/connect.php');



?>
<style>
    .table-striped tbody tr:nth-child(odd) {
      background-color: #f5f5f5; /* Light gray for odd rows */
    }

    .edit-icon, .delete-icon {
      transition: transform 0.2s ease-in-out; /* Add hover animation */
    }

    .edit-icon:hover, .delete-icon:hover {
      transform: scale(1.1); /* Scale icons slightly on hover */
    }
  </style>

</br>
<h1 class="text-center text-info"> All users </h1>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>No</th>
            <th>User name</th>
            <th>User email</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $get_payments = "SELECT * FROM `user_table`";
    $result = mysqli_query($con, $get_payments);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<tr><td colspan='7' class='text-center text-danger mt-5'>NO Users yet</td></tr>";
    } else {
        $number = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $user_id = $row_data['user_id'];
            $user_name = $row_data['user_name'];
            $user_email = $row_data['user_email'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;
            echo  "<tr>
                    <td>$number</td>
                    <td>$user_name</td>
                    <td>$user_email</td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                  </tr>";
        }
    }
    ?>
    </tbody>
</table>
