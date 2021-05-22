<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<title> Hello world</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Record</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" name="get_search" class="form-control" placeholder="Search by name or mobile" required>
                                    </div>
                                        <button type="submit" name="search_by_name_mob" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        include "connection.php";
                        // $connection=mysqli_connect("localhost","root","","dbstudent");
                        if(isset($_POST['search_by_name_mob']))
                        {
                            $id=$_POST['get_search'];
                            $query= "SELECT * FROM studentinfo where name='$id' or mob='$id'";
                            $query_run=mysqli_query($connection,$query);
                            

                        }
                        ?>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col" name='name'>Name</th>
                          <th scope="col">Mobile no</th>
                          <th scope="col">Email</th>
                          <th scope="col">Subject1</th>
                          <th scope="col">Subject2</th>
                          <th scope="col">Subject3</th>
                          <th scope="col">Subject4</th>
                          <th scope="col">Subject5</th>
                          <th scope="col">Total</th>
                          <th scope="col">Pdf</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      if(mysqli_num_rows($query_run)>0)
                            {
                                while($row=mysqli_fetch_array($query_run))
                                {
                       ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['mob'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['marks_subject1'];?></td>
                                    <td><?php echo $row['marks_subject2'];?></td>
                                    <td><?php echo $row['marks_subject3'];?></td>
                                    <td><?php echo $row['marks_subject4'];?></td>
                                    <td><?php echo $row['marks_subject5'];?></td>
                                    <td><?php echo $row['totalmarks'];?></td>  
                                    <td class="text-center"> <a href="download.php?name=<?php echo $row['name']?>" name="btn" type="submit" class="btn btn-danger"><i class="fas fa-file-pdf-o" aria-hidden="true"></i>DOWNLOAD</a>
                                </tr>
                                <?php                                 
                                   
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="6">No Records Found</td>
                                <?php
                            }
                             ?>
                        
                       </tbody>
                   </table>
                         