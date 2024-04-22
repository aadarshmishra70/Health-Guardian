<?php include 'admin_header.php'; ?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Phone</th>
                <th>Sex</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../includes/config.php"; 
            $sql = "SELECT * FROM patients";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>'. $row['address'] .'</td>';
                    echo '<td>'. $row['height'] .'</td>';
                    echo '<td>'. $row['weight'] .'</td>';
                    echo '<td>'. $row['phone'] .'</td>';
                    echo '<td>'. $row['sex'] .'</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">No doctors found</td></tr>';
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<?php include 'admin_footer.php'; ?>
