<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $con = mysqli_connect("localhost:3307", "root", "", "dabm_database");

        // Get the POST data
        $data = json_decode(file_get_contents("php://input"));
        $products = $data->product;
        $orderID = $data->orderID;
        $orderDate = $data->orderDate;
        $orderNote = $data->orderNote;
        $employee = $data->employeeID;

        // Create a new order
        $query = "INSERT INTO `order` (order_ID, order_date, order_info) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sss", $orderID, $orderDate, $orderNote);

        if (mysqli_stmt_execute($stmt)) {
            // If the order creation is successful, proceed with creating order_customer_employee
            $query = "INSERT INTO `purchase_order` (purchase_ID, employee_ID) VALUES (?,?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ss", $orderID, $employee);

            // if (mysqli_stmt_execute($stmt)) {
            //     foreach ($products as $product) {
            //         $productID = $product->id;
            //         $quantity = $product->quantity;

            //         // TO DO: Insert $productName and $quantity into your product table
            //         $productQuery = "INSERT INTO `sale_include` (sale_ID, book_ID, sale_quantity) VALUES (?, ?, ?)";
            //         $productStmt = mysqli_prepare($con, $productQuery);
            //         mysqli_stmt_bind_param($productStmt, "ssi", $orderID, $productID, $quantity);
            //     }
            //     $res = [
            //         'success' => true,
            //         'message' => 'Order created successfully',
            //     ];
            // } else {
            //     $res = [
            //         'success' => false,
            //         'message' => 'Error creating sale order: ' . mysqli_error($con),
            //     ];
            // }
            if (mysqli_stmt_execute($stmt)) {
                foreach ($products as $product) {
                    $productID = $product->id;
                    $quantity = $product->quantity;
            
                    // TO DO: Insert $productName and $quantity into your product table
                    $productQuery = "INSERT INTO `purchase_include` (purchase_ID, book_ID, purchase_quantity) VALUES (?, ?, ?)";
                    $productStmt = mysqli_prepare($con, $productQuery);
                    mysqli_stmt_bind_param($productStmt, "ssi", $orderID, $productID, $quantity);
            
                    // Execute the statement for each product
                    if (mysqli_stmt_execute($productStmt)) {
                        // Success
                    } else {
                        $res = [
                            'success' => false,
                            'message' => 'Error inserting into sale_include: ' . mysqli_error($con),
                        ];
                        echo json_encode($res);
            
                        // Close the prepared statement and the database connection
                        mysqli_stmt_close($productStmt);
                        mysqli_close($con);
            
                        // Stop further processing
                        exit();
                    }
            
                    // Close the prepared statement for each product
                    mysqli_stmt_close($productStmt);
                }
            
                $res = [
                    'success' => true,
                    'message' => 'Order created successfully',
                ];
            } else {
                $res = [
                    'success' => false,
                    'message' => 'Error creating sale order: ' . mysqli_error($con),
                ];
            }
            
        } else {
            $res = [
                'success' => false,
                'message' => 'Error creating order: ' . mysqli_error($con),
            ];
        }

        echo json_encode($res);

        // Close the prepared statement and the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
?>
