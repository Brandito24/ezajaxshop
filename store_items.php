<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
	echo count($_SESSION['name']);
	exit();
  }

  if(isset($_POST['item_src']))
  {
    $_SESSION['name'][]=$_POST['item_name'];
    $_SESSION['price'][]=$_POST['item_price'];
    $_SESSION['src'][]=$_POST['item_src'];
    echo count($_SESSION['name']);
    exit();
  }

  if(isset($_POST['showcart']))
  {
    for($i=0;$i<count($_SESSION['src']);$i++)
    {
      echo "<div class='cart_items'>";
      echo "<br> ";
      echo "<img src='".$_SESSION['src'][$i]."'>";
      echo "<p>".$_SESSION['name'][$i]. ' <a href="#emptycart" id="empty_cart" style="background:red;border-radius: 5px;text-decoration:none;color:white;float:right;" onclick="delfromcart('. $i .')"> x </a></p>';
      echo "<p>".$_SESSION['price'][$i]."</p>";
      echo "</div>";
    }
    echo '<a href="#emptycart" id="empty_cart" style="background:red;border-radius: 5px;text-decoration:none;color:white;float:right;" onclick="empty_cart()">Empty Cart</a>';
    exit(); 
  }

  if(isset($_POST['cart_action']))
  {
    if($_POST['cart_action'] == "empty")
    {
      session_destroy();
      Header("Location:index.php");
    }
    //exit(); 
  }
?>