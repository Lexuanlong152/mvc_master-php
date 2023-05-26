<main id="main">

    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
            <li><a href="index.html">Trang chủ</a></li>
            <li>Khóa học</li>
            <li>Thanh toán</li>
            </ol>
        </div>

        </div>
    </section>
    <section>
    <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Checkout form</h2>
    

    <!--Grid row-->
    <div class="row">
        
    
    <!--Grid column-->
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h3>
                Course name: <?php echo htmlspecialchars($data['course']['name'])?>
                </h3>
            </div>
            <div class="card-body">
                <strong>
                Price: <?php echo htmlspecialchars($data['course']['price'])?>$
                </strong>
            </div>
        </div>


        <!--Card-->
        
        <div class="card">
            
            <!--Card content-->
            <form class="card-body" action="./Pay/repair" method="POST">

                <!--Grid row-->
                
                <!--Grid row-->

                <!--Username-->
                <hr>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="paypal">Paypal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" name="number-card" placeholder="" required>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <input type="hidden" name="user-id" value="<?php echo $data['userid'];?>" />
                <input type="hidden" name="course-id" value="<?php echo $_GET['id'];?>" />
                <button class="btn btn-primary btn-lg btn-block"  type="Submit">Complete Payment</button>

            </form>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-4 mb-4">

        <!-- Heading -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Summary</span>
            <span class="badge badge-secondary badge-pill">1</span>
        </h4>

        <!-- Cart -->
        <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">
                        <?php echo htmlspecialchars($data['course']['name'])?>
                    </h6>
                </div>
                <span class="text-muted">$ <?php echo htmlspecialchars($data['course']['price'])?> </span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                    <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$<?php echo htmlspecialchars($data['course']['price'])?></strong>
            </li>
        </ul>
        <!-- Cart -->

        <!-- Promo code -->
        <form class="card p-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
                </div>
            </div>
        </form>
        <!-- Promo code -->

    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->

    </div>
  
  </section>
</main><!-- End #main -->