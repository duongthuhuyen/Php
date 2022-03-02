<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fullname</th>
      <th scope="col">email</th>
	  <th scope="col">birthday</th>
      <th scope="col">password</th>
	  <th scope="col">adress</th>
    </tr>
  </thead>
  <tbody>
	<?php
    foreach($dsnd as $ndl){
       echo '<tr>
	   <th scope="row">'.$ndl['id'].'</th>
	   <td>'.$ndl['fullname'].'</td>
	   <td>'.$ndl['email'].'</td>
	   <td>'.$ndl['birthday'].'</td>
	   <td>'.$ndl['password'].'</td>
	   <td>'.$ndl['address'].'</td>
	 </tr>';
	}
	?>
  </tbody>
</table>
