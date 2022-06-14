<?php 
include 'conn.php';
header('Content-Type:application/json');
$data =array();
$message=array();


 $action=$_POST['action'];
 

function readall($conn){

    $query="select * from students";
    $res=$conn->query($query);
    if($res){
     
        while($row=$res->fetch_assoc()){

            $data [] =$row;
        }

        $message =array("status" => true, "data"=>$data);
      
    }else{
        $message =array("status" => false, "data"=>$conn->error);


    }

  echo json_encode($message);

}
function deletestudent($conn){
    $studentid=$_POST['studentId'];
    $query="Delete from students where id='$studentid'";
    $res=$conn->query($query);
    if($res){
     


        $message =array("status" => true, "data"=>"Successfully deleted Student");
      
    }else{
        $message =array("status" => false, "data"=>$conn->error);


    }

  echo json_encode($message);

}




function readStudentInfo($conn){
   $stdid=$_POST['id'];
    $query="select * from students where id='$stdid'";
    $res=$conn->query($query);
    if($res){
     
        while($row=$res->fetch_assoc()){

            $data []=$row;
        }

        $message =array("status" => true, "data"=>$data);
      
    }else{
        $message =array("status" => false, "data"=>$conn->error);


    }

  echo json_encode($message);

}
function RegisterStudent($conn){
    $data=array();
    $studentid=$_POST['studentId'];
    $studentname=$_POST['studentName'];
    $studentclass=$_POST['studentClass'];
    $query="insert into students(id,name,class) values('$studentid','$studentname','$studentclass')";
    $res=$conn->query($query);
    if($res){
        
         $data=array("Status" =>true, "data"=>"Successfully Added");
    }else{
        $data=array("status" =>false, "data"=>$conn->error);
    }

    echo json_encode($data);

}
function UpdateStudent($conn){
    $data=array();
    $studentid=$_POST['studentId'];
    $studentname=$_POST['studentName'];
    $studentclass=$_POST['studentClass'];
    $query="update  students set name='$studentname', class ='$studentclass' where id ='$studentid'";
    $res=$conn->query($query);
    if($res){
        
         $data=array("Status" =>true, "data"=>"Successfully updated");
    }else{
        $data=array("status" =>false, "data"=>$conn->error);
    }

    echo json_encode($data);

}


if(isset($action)){
    $action($conn);
}else{
    echo "action required";
}


?>