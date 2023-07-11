
 <html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<?php
 
$conn=mysqli_connect("localhost","root ");
if($conn){
    echo "connected"."<br/>";
}
else
    echo "not connected"."<br/>";
/*
$create="create database bootstrap";
$createdata=mysqli_query($conn,$create);
if($createdata)
    echo "created database"."<br/>";
else
    echo "not created database"."<br/>";*/
$use="use bootstrap";
$usage=mysqli_query($conn,$use);
if($usage)
    echo "Database ready to use"."<br/>";
else
    echo "Database not selected";
 
/*
$table="create table Student(Name varchar(20),password varchar(20),email varchar(100),phone_number varchar(30),Gender varchar(20),Branch varchar(20),Subjects varchar(200))";
$tablecreated=mysqli_query($conn,$table);
if($tablecreated)
    echo "table created";
else
    echo "table not created";*/
 
 $name=$_POST['name1'];
$password=$_POST['password'];
$email=$_POST['email'];
$gender=$_POST['sex'];
$phone=$_POST['phone1'];
$check=$_POST['sub'];
$ch=" ";
foreach($check as $ch1){
    $ch .=$ch1.',';
}
$branch=$_POST['branch'];
$insert="insert into Student values('$name','$password','$email','$phone','$gender','$branch','$ch')";
$insert_data=mysqli_query($conn,$insert);
if($insert_data)
    echo "Data inserted"."<br/>";
else
    echo "Data not Inserted "."<br/>";
  
$select="select * from Student";
$selected=mysqli_query($conn,$select);
$rows=mysqli_num_rows($selected);
if($rows>0){
    echo "<table rules=all frame=border border=1px style=width:100%>";
    echo "<tr>";
        echo "<th>";
        echo 'Name';

        echo "</th>";
        echo "<th>";
        echo 'password';
        echo "</th>";
        echo "<th>";
        echo  'email';
        echo "</th>";
        echo "<th>";
        echo 'phone_number';
        echo "</th>";
        echo "<th>";
        echo 'Gender';
        echo "</th>";
        echo "<th>";
        echo 'Branch';
        echo "</th>";
        echo "<th>";
        echo 'Subjects';
        echo "</th>";
        echo "</tr>";
       
 
    while($record=mysqli_fetch_assoc($selected)){
      #  echo $record['Name']." ".$record['password']." ".$record['email']." ".$record['phone_number']." ".$record['Gender']." ".$record['Branch']." ".$record['Subjects'];
        echo "<tr>";
        echo "<td>";
        echo $record['Name'];

        echo "</td>";
        echo "<td>";
        echo $record['password'];
        echo "</td>";
        echo "<td>";
        echo  $record['email'];
        echo "</td>";
        echo "<td>";
        echo $record['phone_number'];
        echo "</td>";
        echo "<td>";
        echo $record['Gender'];
        echo "</td>";
        echo "<td>";
        echo $record['Branch'];
        echo "</td>";
        echo "<td>";
        echo $record['Subjects'];
        echo "</td>";
        echo "</tr>";
    } 
}
    echo "</table>"."<br/>";
  
    ?>       
    <center>
     <a href=".\bootstrap.html" class="bt btn-primary btn-sm active " role="button"  >Back To Form</a></center>


</body>
</html>
