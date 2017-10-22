<!-- <html>
  <div class="table-responsive">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Image ID</th>
            <th>Geometry</th>
            <th>Material Type</th>
            <th>Material Volume</th>
            <th>Lead Time Estimate</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
      <?php while($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['geometry']; ?></td>
        <td><?php echo $row['material']; ?></td>
        <td><?php echo $row['volume']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['price']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
      </table>
 -->