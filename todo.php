<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>welcome.com</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <?php
    session_start();
    if (!$_SESSION) {
        $location = "login.php";
        header("Location:$location");
    }
    require('db_config.php');
    ?>
    <center>
        <div class="top">
            <b>
                <h2><u>Admin Potal</u></h2>
            </b>
        </div>
        <div class="container">
            <marquee width="60%" direction="left" height="20px">
                <b><i>
                        <h3>Welcome to Admin Potal Here you can assign work to others</h3>
                    </i></b>
            </marquee>
        </div>

        <form action="operation36.php" method="post">
            <div class="my-4">
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label"><b>
                            Task Name
                        </b></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your task name" name="task_name">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Task Information</b></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="task_desk"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Status</b></label>
                    <select name="status" id="status" class="form-control">
                        <option value="">SELECT STATUS FROM HERE</option>
                        <option value="working">working</option>
                        <option value="non_working">non working</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <button type="submit" class="btn btn-dark" name="operation" value="Submit">Submit</button>
                </div>
            </div>
        </form>
        <div class="top">
            <b>
                <h2><u>Admin Data</u></h2>
            </b>
        </div>
        <div class="container">
            <marquee width="60%" direction="left" height="40px">
                <b><i>
                        <h3>Here you can manupulate the data and performing crud operation</h3>
                    </i></b>
            </marquee>
        </div>
            <?php
            $sql = "select * from student_todo";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <form action="operation36.php" method="post">
                    <table>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </tr>
                        <tr>
                            <td>
                                <label for="Task_name">Task Name: </label>
                            </td>
                            <th>
                                <input type="text" name="task_name" value="<?php echo $row['task_name']; ?>">
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <label for="Task_name">Task Name: </label>
                            </td>
                            <th>
                                <input type="text" name="task_desk" value="<?php echo $row['task_desk']; ?>">
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <label for="Status">Status</label>
                            </td>
                            <th>
                                <select name="status" value="<?php echo $row['status']; ?>" >
                                    <option value="">SELECT STATUS FROM HERE</option>
                                    <option value="working">working</option>
                                    <option value="non_working">non working</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>
                            <button type="submit" class="btn btn-warning" name="operation" value="Update">Update</button>
                            </th>
                            <th>
                            <button type="submit" class="btn btn-danger" name="operation" value="Delete">Delete</button>
                            </th>
                        </tr>
                    </table>
                    <hr>
                </form>
            <?php    }
            ?>
    </center>
</body>

</html>