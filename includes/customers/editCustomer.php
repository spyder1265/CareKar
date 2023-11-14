<div class="modal-form-container">
  <div class="left-form-container">
    <!-- Name input -->
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="form-outline">
          <label class="form-label" for="fname">First name :</label>
          <input type="text" id="fname" placeholder="John" name="firstname" class="form-control" />
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="form-outline">
          <label class="form-label" for="lname">Last name :</label>
          <input type="text" id="lname" class="form-control" placeholder="Doe" name="lastname" />
        </div>
      </div>
    </div>

    <!-- phone input -->
    <div class="form-outline mb-4">
      <label class="form-label" for="phone">Phone :</label>
      <input type="tel" id="phone" placeholder="(0) 000 - 000 - 0000" class="form-control" name="phone" />
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="vehicleName">Vehicle name :</label>
      <input type="text" id="vehicleName" placeholder="vehicle name" class="form-control" name="vname" />
    </div>

  </div>

  <div class="right-form-container">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="form-outline mb-4">
          <label class="form-label" for="vehicleMake">Vehicle make :</label>
          <input type="text" id="vehicleMake" placeholder="vehicle make" class="form-control" name="vmake" />
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="form-outline mb-4">
          <label class="form-label" for="price">Price :</label>
          <input type="text" id="price" placeholder="$" class="form-control" name="price" required />
        </div>
      </div>
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="email">Email address :</label>
      <input type="email" id="email" placeholder="user@company.com" class="form-control" name="email" />
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="idstr">id :</label>
      <input type="text" id="idstr" class="form-control" name="id" required readonly />
    </div>



  </div>
</div>