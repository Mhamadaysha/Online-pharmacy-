<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Brands</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TAgk2i238SDdjTHvkQyEJg1zHOT7IWSufYYBWUCyxYsrzQfxJEF-iOiC9zxzHPeb" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>
<body>
</br>
  <h1 class="text-center text-info">All Brands</h1>
  <table class="table table-striped table-bordered table-hover text-center">
    <thead>
      <tr>
        <th scope="col">Number</th>
        <th scope="col">Brand Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $select_car = "SELECT * FROM brands";
        $result = mysqli_query($con, $select_car);
        $numbers = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $brand_id = $row['brand_id'];
          $brand_title = $row['brand_title'];
          $numbers++;
          echo "<tr>
          <td>$numbers</td>
          <td>$brand_title</td>
          <td>
            <a href='index.php?edit_brand=$brand_id' class='text-dark edit-icon'>
              <i class='fas fa-pen-square' style='font-size: 24px;'></i>
            </a>
          </td>
          <td>
            <a href='index.php?Delete_brand=&delete_order=$brand_id' class='text-danger delete-icon' >
              <i class='fas fa-trash' style='font-size: 20px;'></i>
            </a>
          </td>
        </tr>";
  
        }
      ?>
    </tbody>
  </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you Want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href='index.php?Delete_brand&delete_order=<?php echo $brand_id ?>' class='btn btn-danger'>Yes</a>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/your-fontawesome-kit-code.js" crossorigin="anonymous"></script>
</body>
</html>