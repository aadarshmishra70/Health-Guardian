<?php include 'admin_header.php'; ?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Qualification</th>
                <th>Phone</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../includes/config.php"; 
            $sql = "SELECT * FROM doctors";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['qualification'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['points'] . '</td>';
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
