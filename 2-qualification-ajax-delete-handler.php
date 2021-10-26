<?php
session_start();
include("db-connection.php");







#4th method

if($_POST){
        $id= $_POST["uid"];
        $sel_query= mysqli_query($db_conn, "select * from emp_qualification where q_id='$id'");
        $num_rows=mysqli_num_rows($sel_query);
        if($num_rows>0){
            $del_query=mysqli_query($db_conn, "delete from emp_qualification where q_id='$id'");
            $aff_rows=mysqli_affected_rows($db_conn);
            if($aff_rows>0){
                
                $fetch=mysqli_fetch_array($sel_query);
                $eid= $fetch["emp_id"];
                $query=mysqli_query($db_conn, "select * from emp_qualification where emp_id='$eid'");
                $rows= mysqli_num_rows($query);
                
                $temp = array();
                $temp[]="del";
                $temp[]=$rows;
                echo json_encode($temp);
            }
    
        }
    }




# 3rd method
// if($_POST){
//     $id= $_POST["uid"];
//     $sel_query= mysqli_query($db_conn, "select * from emp_qualification where q_id='$id'");
//     $num_rows=mysqli_num_rows($sel_query);
//     if($num_rows>0){
//         $del_query=mysqli_query($db_conn, "delete from emp_qualification where q_id='$id'");
//         $aff_rows=mysqli_affected_rows($db_conn);
//         if($aff_rows>0){
            
//             $fetch=mysqli_fetch_array($sel_query);
//             $eid= $fetch["emp_id"];
//             $query=mysqli_query($db_conn, "select * from emp_qualification where emp_id='$eid'");
//             $rows= mysqli_num_rows($query);
//             echo "del~$rows";
//         }

//     }
// }




// 2nd method
// if ($_POST) {
//     $id = $_POST["uid"];
//     $var = "";

//     $d_query = mysqli_query($db_conn, "select * from emp_qualification where q_id='$id'");
//     $d_rows = mysqli_num_rows($d_query);
//     if ($d_rows > 0) {
//         $del_query = mysqli_query($db_conn, "delete from emp_qualification where q_id='$id'");
//         $fetch_id = mysqli_fetch_array($d_query);
//         $emp_id = $fetch_id["emp_id"];
//         $sel_query = mysqli_query($db_conn, "select * from emp_qualification where emp_id='$emp_id'");
//         $rows = mysqli_num_rows($sel_query);
        
//         if ($rows > 0) {
//             while ($fetch = mysqli_fetch_array($sel_query)) {
//                 $quali = $fetch['qualification'];
//                 $uname = $fetch['university_name'];
//                 $pyear = $fetch['passing_year'];
//                 $percen = $fetch['percentage'];

//                 $var.= "
//                     <tr>
//                         <td>$quali</td>
//                         <td>$uname</td>
//                         <td>$pyear</td>
//                         <td>$percen</td>
//                         <td> edit | delete;</td>
//                     </tr>
//                ";
//             }
//         }
//     }
//     echo $var;
// }



//1st method -- table still shown in this method
//if ($_POST["uid"]) {
//    $id = $_POST["uid"];
//    $d_query = mysqli_query($db_conn, "select * from emp_qualification where q_id='$id'");
//    $d_rows = mysqli_num_rows($d_query);
//    if ($d_rows > 0) {
//        $del_query = mysqli_query($db_conn, "delete from emp_qualification where q_id='$id'");
        // $aff_rows = mysqli_affected_rows($db_conn);
        // if ($aff_rows > 0) {
        //     echo 1;
        // } else {
        //     echo 0;
        // }

   // }
//}
