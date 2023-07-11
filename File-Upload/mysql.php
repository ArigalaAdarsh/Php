<html>
    <head>
         
</head>
    <body>
        <table border="2px "   rules="all" style="width:100%">
            <?php
$handler=mysqli_connect("localhost","root ","","test");
if($handler){
    echo "connection";
}
else 
    echo "no connection";


$query = "use test;";
$resultQuery = mysqli_query($handler,$query);

/*
$query1 = "create table userlogin(username varchar(15),password char(6));";
$resultTable = mysqli_query($handler,$query1);
if($resultTable)
echo "table created"."<br>";
else
echo "table not created "."<br>";*/

 
$user = $_POST['user'];
$pwd = $_POST['pass'];

$query2 = "insert into userlogin values('$user','$pwd');";
$resultInsert = mysqli_query($handler,$query2);
if($resultInsert)
echo "<br>"."values inserted";
else
echo "values not inserted";

$query4 = "delete from userlogin where username=\" \";";
$resultDelete = mysqli_query($handler,$query4);
$query3 = "select *from userlogin;";
$resultSelect = mysqli_query($handler,$query3);

$rowcheck = mysqli_num_rows($resultSelect);
if($rowcheck>0)
{
	while($record = mysqli_fetch_assoc($resultSelect))
	{
     ?>
        <tr>
            <td><?php echo $record['username']; ?> </td>
            <td><?php echo $record['password']; ?> </td>
     </tr>
    <?php  
          
 	}
}
$target="uploads/";
$target_file =$target.basename($_FILES["image"]["name"]);  
$img_extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$size=$_FILES["image"]["size"];


$max=5*1024*1024;
if($size>$max)
    
    echo "size is large";


  
else if ($img_extension !='jpg'&&$img_extension!='png' && $img_extension!='gif'&&$img_extension !='jpeg'){
    echo "not correct extenstion";
     }

else if(isset($_POST['submit'])){
  $file_name=$_FILES['image']['name'];
  $file_size=$_FILES['image']['size'];
  $file_tmp=$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  move_uploaded_file($file_tmp,$target.$file_name);

  echo "<tr>";
  echo "<td>"."uploaded successfully"."</td>";
     if(file_exists("$target_file"))
    ?>
    <td><a href="<?php echo $target_file; ?>" download >download</a></td>
    </tr>       
   
    
   <?php 
    
}

  

?>
 
</table>
</body>
</html>