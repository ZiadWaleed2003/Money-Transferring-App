<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>


    <!-- card Start -->
        <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <div class="col-12">
              <div class="bg-secondary rounded h-100 p-4">
                <a href="add_card.php" class=" col-md-3 btn btn-primary float-end">
                  <span class="tf-icons bx bx-add-to-queue"></span> Add New Card
                </a>
                  <h4 class="mb-4">Cards</h4>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Card Name</th>
                                  <th scope="col">Card Number</th>
                                  <th scope="col">Limit</th>
                                  <th scope="col"></th>
                                  <th scope="col">Action</th>
                                  <th scope="col">Fav</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <th scope="row">1</th>
                                  <td>Alhaly</td>
                                  <td>5466456456</td>
                                  <td>100000</td>
                                  <td></td>
                                  <td>
                                    <button type="submit" name="delete" class="btn btn-outline-danger">
                                      <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                  </td>
                                  <td>
                                    <button class="icon-button">
                                      <i class="fas fa-heart"></i>
                                    </button>
                                  </td>
                              </tr>
                              <tr>
                                  <th scope="row">2</th>
                                  <td>CIB</td>
                                  <td>654678631</td>
                                  <td>100000</td>
                                  <td></td>
                                  <td>
                                    <button type="submit" name="delete" class="btn btn-outline-danger">
                                      <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                  </td>
                                  <td>
                                    <button class="icon-button">
                                      <i class="fas fa-heart"></i>
                                    </button>
                                  </td>
                              </tr>
                              <tr>
                                  <th scope="row">3</th>
                                  <td>QNB</td>
                                  <td>123456</td>
                                  <td>10000</td>
                                  <td></td>
                                  <td>
                                    <button type="submit" name="delete" class="btn btn-outline-danger">
                                      <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                  </td>
                                  <td>
                                    <button class="icon-button">
                                      <i class="fas fa-heart"></i>
                                    </button>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
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