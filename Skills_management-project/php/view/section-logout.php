
        <!-- <section>
            <script>
            location.href = 'php/view/section-index.php';
            </script>
        </section> -->
     <?php

session_start();
 

$_SESSION = array();
 

session_destroy();
 
// Redirect to index page
header("location:../../index.php");
exit;
?>