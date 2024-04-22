<?php include 'admin_header.php'; ?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Driver Name</th>
                <th>Type</th>
                <th>Phone</th>
                <th>Patient Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../includes/config.php"; 
            $sql = "SELECT * FROM ambulances INNER JOIN patients ON ambulances.patient_id = patients.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['driver_name'] . '</td>';
                    echo '<td>' . $row['type'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
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
