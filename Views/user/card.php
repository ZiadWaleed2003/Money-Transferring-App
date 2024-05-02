<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>

<?php
  require_once '../../controllers/CardController.php';
  $CardController=new CardController; 
  $cards=$CardController->getAllCards();

  if (isset($_POST["delete"])) {
    if (!empty($_POST["cardId"])) {
      if ($CardController->deleteCard($_POST["cardId"])) {
        $cards=$CardController->getAllCards();
      }
    }
  }
  if (isset($_POST["fav"])) {
    if (!empty($_POST["cardId"])) {
      if ($CardController->favCard($_POST["cardId"])) {
        $cards=$CardController->getAllCards();
      }
    }
  }


  
?>
    <!-- card Start -->
        <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <div class="col-12">
              <div class="bg-secondary rounded h-100 p-4">
                <a href="add_card.php" class=" col-md-3 btn btn-primary float-end">
                  <span class="tf-icons bx bx-add-to-queue"></span> Add New Card
                </a>
                  <h2 class="mb-4">Cards</h2>

                  <?php
                  if (is_array($cards) || $cards instanceof Countable) {
                       if(count($cards)!=0){
                       ?>
                     <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Bank Name</th>
                                  <th scope="col">Card Name Holder</th>
                                  <th scope="col">Card Number</th>
                                  <th scope="col">Fav</th>
                                  <th scope="col">Edit</th>
                                  <th scope="col">Delete</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                                     foreach($cards as $card){
                           ?>
                              <tr>
                                  <td><?php echo $card["id"]?></td>
                                  <td><?php echo $card["bank"]?></td>
                                  <td><?php echo $card["name"]?></td>
                                  <td><?php echo $card["number"]?></td>
                                  <td>
                                  <form action="card.php" method="POST">
                                  <input type="hidden" name="cardId" value="<?php echo $card["id"] ?>">
                                    <button type="submit" name="fav" class="icon-button">
                                      <i class="fas fa-heart <?php echo ($card["favourite"]==1)? 'text-danger':'' ?>" ></i>
                                    </button>
                                    </form>
                                  </td>
                                  <td>
                                      <a href="editcard.php?myValue=<?php echo $card["id"]?>">
                                    <button type="submit" name="edit" class="btn btn-outline-light ">
                                      <span class="bx bx-edit-alt"></span>
                                    </button></td>
                                     </a>
                                  </td>
                                  <td>
                                  <form action="card.php" method="POST">
                                   <input type="hidden" name="cardId" value="<?php echo $card["id"] ?>">
                                    <button type="submit" name="delete" class="btn btn-outline-danger">
                                      <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                  </form>
                                  </td>
                              </tr>
                          <?php
                                }
                            ?>
                          </tbody>
                      </table>
                    </div>

              <?php 
                       }}
                  else{
                    $cards = [];
                    ?>
                    <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Bank Name</th>
                                  <th scope="col">Card Number</th>
                                  <th scope="col">Fav</th>
                                  <th scope="col"></th>
                                  <th scope="col">Edit</th>
                                  <th scope="col">Delete</th>
                              </tr>
                              <tr>
                                  <td>No Card Exists</td>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                    </div>
                    <?php
                  }
                ?>

                  
                  <a href="fav-list.php">
                    <div class="m-n2">
                      <button type="button" class="btn btn-secondary rounded-pill m-2">Favorite List</button>
                    </div>
                  </a>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>
         <!-- card End -->


        <?php require_once("../main-components/footer.php") ?>