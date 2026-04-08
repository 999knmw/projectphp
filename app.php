<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        h3 {
            color: #4CAF50;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #73ba75;
            color: white;
            width: 35%;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-link:hover {
            background-color: #005f7a;
        }
        .error {
            color: red;
            text-align: center;
            padding: 20px;
        }
        .success {
            background-color: #dff0d8;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Job Application Submitted</h2>
        
        <?php
        // Check if any data was sent
        if (empty($_GET)) {
            echo '<div class="error">No application data received. Please go back and submit the form.</div>';
        } else {
            echo '<div class="success"> Thank you for your application! Here\'s what you submitted:</div>';
            
            // Display the received data in a table
            echo '<table>';
            echo '<tr><th>Field</th><th>Value</th></tr>';
            
            // Define friendly names for each field
            $fieldNames = [
                'name' => 'Full Name',
                'email' => 'Email Address',
                'phone' => 'Phone Number',
                'age' => 'Birth Date',
                'address' => 'Address',
                'topic' => 'Gender',
                'job' => 'Desired Job Title',
                'available' => 'Availability',
                'locate' => 'Willing to Relocate',
                'message' => 'Additional Message'
            ];
            
            // Process each field
            foreach ($_GET as $key => $value) {
                // Skip if value is empty
                if ($value === "" || $value === null) {
                    $displayValue = '<em style="color: #999;">Not provided</em>';
                } else {
                    // Sanitize output to prevent XSS attacks
                    $displayValue = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }
                
                // Use friendly name if available, otherwise capitalize the key
                if (isset($fieldNames[$key])) {
                    $fieldName = $fieldNames[$key];
                } else {
                    $fieldName = ucfirst(str_replace('_', ' ', $key));
                }
                
                echo "<tr>";
                echo "<th>{$fieldName}</th>";
                echo "<td>{$displayValue}</td>";
                echo "</tr>";
            }
            
            echo '</table>';
            
            // Show the raw query string for educational purposes
        
        }
        ?>
        
        <br>
        <a href="form.html" class="back-link">← Back to Application Form</a>
    </div>
</body>
</html>