<h1>Patients List</h1>

<?php foreach($data['patients'] as $item): ?>
    <?php 
        
        echo "<pre>";
        print_r($item); 
        echo "</pre>";
        
    ?>
<?php endforeach; ?>