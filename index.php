<?php
include("connections/db.php");  
error_reporting(0);  
session_start(); 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
</head>
<?php include("includes/header.php");  ?>

<style>


 #category-item {
    display: grid;
    margin: 10px;
  grid-template-columns: repeat(3, 1fr); 
  gap: 8repx; 

} 

/* #card-image{
    padding-top: 1rem;
    padding-left: 1rem;
    width: 15rem;
    height: 15rem; */
/* } */
/* Optional: Make sure items have consistent appearance */


.category-item span {
    display: block;
}
</style>


<body>
    <div id="mainbody">

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/ads/1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/ads/2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/ads/3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <section class="oder-now">
        <div style="margin-top: 20px;"><center>
            <span><h1>HOT DEALS</h1></span>
            </center>
        </div>
    </section>

        <section class="featured-restaurants">
            <div class="container">
                <div class="row">
                        <div>
                            <h4>Categories</h4> 
                    </div>   
                </div>
    
                <div class="row">
                    <div id="category-item">
                        
                        <?php  
                        $categories= mysqli_query($conn,"select * from categories");  
                            while($rows=mysqli_fetch_array($categories))
                            {
                               echo '<div class="card" style="width: 18rem; position: relative; margin-top: 1rem;">
                                 <img src="assets/images/Categories/'.$rows['c_img'].'" class="card-img-top" alt="logo">
                                <div class="card-body">
                                <div style="padding-bottom: 40px">
                                    <h5 class="card-title">'.$rows['c_name'].'</h5>
                                      <p class="card-text">'.$rows['c_description'].'</p>
                                </div>
                                      <div class="card-actions justify-end" style="position: absolute; bottom: 10px; right: 10px; ">
                                <a class="btn btn-primary" href="products.php?cat_id='.$rows['c_id'].'">See More</a>
                                </div>
                            </div>
                            </div>';

                        //   echo   '<div class="card w-30 shadow-xl">
                        //      <figure class= "w-96"><img id="card-image" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
                        //     <div class="card-body">
                        //              <h2 class="card-title">'.$rows['c_name'].'</h2>
                        //     <p>'.$rows['c_description'].'</p>
                        //   <div class="card-actions justify-end">
                        //   <a class="btn btn-primary" href="products.php?cat_id='.$rows['c_id'].'">See More</a>
                        // </div>
                        // </div>
                        //      </div>';
                            }
                        ?>
                    </div>
                </div>
     
           
        </section>
        </div>
        
</body>

<?php include("includes/footer.php");  ?>
</html>