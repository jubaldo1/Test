<?php
    include 'header.php';
    include 'dbConnect.php';
    $dbConn = getDatabaseConnection();
?>
  
<!--Filter through form-->
<form method="GET">
    <h3>Filter through by product:</h3>
<select class = "search" name= "filter">
    <option value="all" selected="selected">All</option>
</select>
<br><br>
</form>

<!--CREATES TABLE-->
<table class='table table-bordered' id="log">
<thead>
<tr>
<th>Date</th>
<th>Shipper</th>
<th>Product</th>
<th>Manufacturer</th>
<th>Style</th>
<th>Color</th>
<th>Dylot</th>
<th>Size</th>
<th>Roll Number</th>
<th>Cartons</th>
<th>Sidemark</th>
<th>P.O. #</th>
<th> More Info </th>
</tr>
</thead>
<tbody>
</tbody>
</table>

<br><br>


<!-- Modal -->
<div class="modal fade" id="productInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productNameModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="productInfo"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
<?php
    include 'footer.php';
?>