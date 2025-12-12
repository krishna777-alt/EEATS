
<?php include "partials/header.php";
//  echo $_GET["id"];
echo $_SESSION["REQUEST_URL"];
 $user = $_SESSION["user_id"];
?>

 <?php 
    $food_id = $_GET["menu_id"];

    $sql = "SELECT * FROM menu_tb WHERE id=$food_id";
    $res = mysqli_query($conn, $sql);
    $food = mysqli_fetch_array($res);

    include "partials/food-display-section.php";
 ?>
 <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- /////////////////////////////////////////////// -->
 
<!-- /////////////// -->

<script src="js/food-details.js"></script>


<script>
    let count = 1;
    const countDisplay = document.getElementById("qty-count");
    const addToCartLink = document.getElementById("add-to-cart-link");
    const foodId = <?php echo $food['id']; ?>; // PHP embeds the food ID here

    document.getElementById("increase").onclick = () => {
        count++;
        updateQtyDisplay();
    };

    document.getElementById("decrease").onclick = () => {
        if (count > 1) {
            count--;
            updateQtyDisplay();
        }
    };

    function updateQtyDisplay() {
        countDisplay.textContent = count;
        addToCartLink.href = `partials/add-to-cart.php?id=${foodId}&qty=${count}`;
    }
    updateQtyDisplay(); // Initialize on page load
</script>

<?php include "item-details.php";?>
 <!-- <script>
//   let count = 1;
// const countDisplay = document.getElementById("qty-count");

// document.getElementById("increase").onclick = () => {
//   count++;
//   countDisplay.textContent = count;
  
// };

// document.getElementById("decrease").onclick = () => {
//   if (count > 1) {
//     count--;
//     countDisplay.textContent = count;
//   }
// };

// </script> -->
