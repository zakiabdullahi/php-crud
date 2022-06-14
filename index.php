<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Crud Operation</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>

  <div class="container">
       <div class="row justify-content-center m-2">

               <div class="col-sm-8">
               <button  id="AddNew"class="btn btn-success float-left">Add new Student</button>
                    <table class="table" id="studentTable">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Class</th>
                                 <th>Actions</th>
                             </tr>
                         </thead>
                         <tbody class="tbody">
                           

                         </tbody>
                    </table>

               </div>
               <div class="modal" tabindex="-1" id="studentModal"> 
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title">User Info</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                           <form action="" id="StudentForm">
                               <div class="form-group m-1">
                                   <input type="text" name="studentId" id="studentId" class="form-control" placeholder="enter your id">
                               </div>
                               <div class="form-group m-1">
                                   <input type="text" name="studentName" id="studentName" class="form-control" placeholder="enter your name">
                               </div>
                               <div class="form-group m-1">
                                   <input type="text" name="studentClass" id="studentClass" class="form-control" placeholder="enter your class">
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Save changes</button>
                               </div>
                           </form>
                       </div>
                     </div>
                   </div>
                 </div>
       </div>

  </div>





 <script src="./js/bootstrap.bundle.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

 <script src="main.js"></script>
</body>
</html>
