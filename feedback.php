<?php include('partials-front/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Feedback</h1>

        <br><br>
        
        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Email Id: </td>
                    <td>
                        <input type="email" name="email_id" placeholder="Enter Your email">
                    </td>
                </tr>
                

                <tr>
                    <td>feedback: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Feedback of the Food."></textarea>
                    </td>
                </tr>

                

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Feedback" class="btn-secondary">
                    </td>
                </tr>

            </table>
            
        </form>


</div>
</div>
<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $email_id = $_POST['email_id'];
        $description = $_POST['description'];
        

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO feedback SET 
            full_name='$full_name',
            email_id'='$email_id',
            description='$description'

            
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Feedback Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Feedback.</div>";
            //Redirect Page to Add Admin
            header('location:'.SITEURL.'admin/');
        }

    }
    
?>